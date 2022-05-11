@extends('_layout')

@section('content')
<div class="container p-5">
  <div class="card col-6 mx-auto">
    <div class="card-header d-flex justify-content-between bg-dark bg-gradient text-white h3">
      Add Faculty
    </div>
    <div class="card-body">
      <form action="{{ route('faculties.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <div>
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="200" minlength="1" required>
            <small class="text-danger name-validation">The name field should not be empty!</small>
          </div>
          <div>
            <label class="form-label" for="term_id" class="label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary bg-gradient">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script src="{{ asset('/js/common.js') }}" type="text/javascript"></script>
@stop