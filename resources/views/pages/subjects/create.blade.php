@extends('_layout')

@section('content')
<div class="container p-5">
  <div class="card col-6 mx-auto">
    <div class="card-header d-flex justify-content-between bg-dark bg-gradient text-white h3">
      Add Subject
    </div>
    <div class="card-body">
      <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <div>
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="200" minlength="1" required>
            <small class="text-danger name-validation">The name field should not be empty!</small>
          </div>
          <div>
            <label class="form-label" for="term_id" class="label">Term</label>
            <select name="term_id" class="form-control" required>
              @foreach ($terms as $term)
              <option value="{{ $term->id }}">{{ $term->name }}</option>
              @endforeach
            </select>
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