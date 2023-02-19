@extends('layouts.layout')

@section('section')
  <div class="row mt-4">
    <div class="col-md-6 m-auto">
      <h3 class="text-center">Registration</h3>
      <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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
          Register
        </button>
      </form>
    </div>
  </div>
@endsection
