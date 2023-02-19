@extends('layouts.layout')

@include('layouts.nav_bar')
@section('section')
  @if(session('success'))
    <div class="row mt-2">
      <div class="col-md-12 text-center">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ Session::get('success') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  @endif


  <div class="row mt-4">
    <div class="col-md-6 m-auto">
      <h3 class="text-center">Create user</h3>
      <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
          <label for="user_name">User name</label>
          <input
            type="text"
            class="form-control"
            id="user_name"
            name="user_name"
            placeholder="User name"
            value="{{ old('user_name') }}"
          >
          @error('user_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input
            type="text"
            class="form-control"
            id="phone"
            name="phone"
            placeholder="Phone number"
            value="{{ old('phone') }}"
          >
          @error('phone')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <button
          type="submit"
          class="btn btn-primary"
        >
          Create
        </button>
        <a
          href="{{ route('users.index') }}"
          class="btn btn-secondary"
        >
          Back
        </a>
      </form>
    </div>
  </div>
@endsection
