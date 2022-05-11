@extends('_layout')

@section('content')
<div class="container p-5">
  <div class="card col-6">
    <div class="card-header">
      Add Subject
    </div>
    <div class="card-body">
      <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group ">
          <div class="name">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="200" minlength="1" required>
            <small class="text-danger name-warning">The name field cannot be empty!</small>
          </div>
          <div class="term_id">
            <label class="form-label" for="term_id" class="label">Term</label>
            <select name="term_id" id="term_id" class="form-control" required>
              @foreach ($terms as $term)
              <option value="{{ $term->id }}">{{ $term->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
            $('.name-warning').hide();
            $('button').attr("disabled", true);;
            $('#name').focusout(function() {
                if ($(this).val() == '' || $(this).val() == "null") {
                    $('.name-warning').text('The name field cannot be empty!');
                    $('.name-warning').show();
                    $('button').attr("disabled", true);
                } else {
                    if ($(this).val().length >= 200) {
                        $('.name-warning').show();
                        $('.name-warning').text('The name cannot be more than 200 characters!');
                        $('button').attr("disabled", true);
                    } else {
                        $('.name-warning').hide();
                        $('button').attr("disabled", false);
                    }
                }
            })
        });
</script>
@stop