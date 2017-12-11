<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
        
        if(!empty($data['referer']))
        {
          $referer = User::where('username', base64_decode($data['referer']))->first();
          if (!empty($referer)) 
          {
            
            // ratings to be updated
            $rating1 = $referer->rating;
            $rating2 = Rating::where('username', $referer->rating['partner1'])->first();
            $rating3 = Rating::where('username', $referer->rating['partner2'])->first();
            
            $rating1->score += 3;
            $rating1->save();
            if(!empty($rating2))
            {
              $rating2->score += 2;
              $rating2->save();
            }
            if(!empty($rating3))
            {
              $rating3->score += 1;
              $rating3->save();
            }
          }          
        }
        
        $user->rating()->create([
          'username' => $user->username,
          'score' => 0,
          'partner1' => !empty($referer)? $referer->username : '',
          'partner2' => !empty($referer)? $referer->rating['partner1'] : '',
          'partner3' => !empty($referer)? $referer->rating['partner2'] : ''
        ]);       
      
        return $user;
    }
}
