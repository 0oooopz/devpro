<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('content.index') }}">Main page</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="{{ route('content.generate.link') }}">Generate new link</a>
              <a class="nav-link" href="{{ route('content.deactivate.link') }}">Deactivate link</a>
              <a class="nav-link" href="{{ route('content.history') }}">History</a>
              <a class="nav-link" href="{{ route('users.index') }}">Users</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>

