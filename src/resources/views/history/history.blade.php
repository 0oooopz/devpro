@extends('layouts.layout')

@include('layouts.nav_bar')

@section('section')

  @include('layouts.alerts')

  @if(!count($history))
    <div class="col-md-12 text-center mt-2">
      <h2>No results</h2>
      <h3>Try to <a href="{{ route('content.index') }}">Play</a></h3>
    </div>
  @else
    <div class="container mt-2">
      <div class="row">
        <div class="col-md-12 ">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Number</th>
                <th scope="col">Result</th>
                <th scope="col">Pay</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($history as $result)
                <tr>
                  <th scope="row">{{ $result->id }}</th>
                  <td>{{ $result->number }}</td>
                  <td>{{ Str::upper($result->result) }}</td>
                  <td>{{ $result->pay }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  @endif
@endsection