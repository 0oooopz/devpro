@extends('layouts.layout')

@include('layouts.nav_bar')

@section('section')
  @include('layouts.alerts')
  @if(session('create.link'))
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ Session::get('create.link') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  @endif

  <div class="row mt-2">
    <div class="col-md-6">
      <a class="btn btn-primary" href="{{ route('content.pay') }}" role="button">Im Feeling Lucky</a>
    </div>
    <div class="col-md-6">
      <p>Link: {{ $user->link }}</p>
    </div>
  </div>

  @if(session('pay'))
    <div class="row mt-3">
      <div class="col-md-12 text-center">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>{{ Session::get('pay') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  @endif

@endsection