@extends('layouts.layout')

@include('layouts.nav_bar')

@section('section')
  @include('layouts.alerts')

  @if(session('deleted'))
    <div class="row mt-2">
      <div class="col-md-12 text-center">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ Session::get('deleted') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  @endif
  <div class="container my-2">
    <div class="row d-flex align-items-center">
      <div>
        <a role="button" class="ml-4 btn btn-success" href="{{ route('users.create') }}">Add User</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">User name</th>
              <th scope="col">Link</th>
              <th scope="col">Link expired at</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody class="ajax-sort">
            @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->link }}</td>
                <td>{{ $user->expired_at }}</td>
                <td>
                  <a
                    class="btn btn-sm btn-primary" href="{{ route('users.show',['user' => $user]) }}"
                    role="button"
                  >Show</a>
                  <a
                    class="btn btn-sm btn-secondary" href="{{ route('users.edit',['user' => $user]) }}"
                    role="button"
                  >Edit</a>
                  <form class="d-inline"  method="POST" action="{{ route('users.destroy',['user' => $user]) }}">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger delete-btn" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{ $users->links() }}
@endsection