@if(session('update.link'))
  <div class="row mt-2">
    <div class="col-md-12 text-center">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('update.link') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
@endif
@if(session('deactivate.link'))
  <div class="row mt-2">
    <div class="col-md-12 text-center">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('deactivate.link') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
@endif