@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Score</th>
                        <th>Partner 1</th>
                        <th>Partner 2</th>
                        <th>Partner 3</th>
                      </tr>
                    </thead>
                  @foreach ($ratings as $rating)
                  <tr>
                    <td>
                      {{$rating->user_id}}
                    </td>
                    <td>
                      {{$rating->username}}
                    </td>
                    <td>
                      {{$rating->score}}
                    </td>
                    <td>
                      {{$rating->partner1}}
                    </td>
                    <td>
                      {{$rating->partner2}}
                    </td>
                    <td>
                      {{$rating->partner3}}
                    </td>
                  </tr>
                  @endforeach
                  </table>
                  {{$ratings->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
