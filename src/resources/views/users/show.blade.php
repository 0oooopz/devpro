@extends('layouts.layout')

@include('layouts.nav_bar')
@section('section')
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h3 class="text-center my-4">Addition information</h3>
      <div class="card">
        <div class="card-header text-center">
          User card
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">User name : {{ $user->user_name }}</li>
          <li class="list-group-item">Phone : {{ $user->phone }}</li>
          <li class="list-group-item">Unique link : {{ $user->link }}</li>
          <li class="list-group-item">Expired at : {{ $user->expired_at }}</li>
        </ul>
      </div>
      <a class="btn btn-primary mt-2" href="{{ route('users.index') }}">Back</a>
    </div>
  </div>
@endsection