@extends('layouts.layout')

@include('layouts.nav_bar')
@section('section')
  <div class="row mt-2">
    @if(session('success'))
      <div class="col-md-12 text-center">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ Session::get('success') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif
    <div class="col-md-6 mx-auto">
      <h3 class="text-center">Edit user</h3>
      <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="user_name">User name</label>
          <input type="text" class="form-control" name="user_name" value="{{ old('user_name') ?? $user->user_name }}">
          @error('user_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $user->phone }}">
          @error('phone')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
      </form>
    </div>
  </div>
@endsection