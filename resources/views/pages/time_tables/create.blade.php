@extends('_layout')
@section('content')

<div class="container">
  <div class="row">

    <!-- begin::Alert Message -->
    @if(session('message'))
    <div class="alert alert-success alert-dismissible">
      <strong>Success!</strong> {{session('message')}}.
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif
    <!-- end::Alert Message -->

    <h1 class="py-2">Add Time Table</h1>
  </div>

  {{-- Start::Add Data --}}
  <div class="border p-3">
    <form action="{{route('time_tables.store')}}" method="POST" enctype="multipart/form-data"
      onSubmit=validateFields();>
      <div class="row">
        @csrf
        <div class="form-group col-md">
          <label for="subject"><span class="text-dark font-weight-bold">Subject<span
                class="text-danger">*</span></label>
          <select name="subject_id" id="" class="form-control" required>
            <option value="" selected>Select</option>
            @if ($subjects)
            @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{$subject->name}}</option>
            @endforeach
            @endif
          </select>
        </div>
        <div class="form-group col-md">
          <label for="faculty"><span class="text-dark font-weight-bold">Faculty<span
                class="text-danger">*</span></label>
          <select name="faculty_id" id="" class="form-control" required>
            <option value="" selected>Select</option>
            @foreach ($faculties as $faculty)
            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md">
          <label for="session_start_time"><span class="text-dark font-weight-bold">Session Start Time<span
                class="text-danger">*</span></label>
          <input type="time" id="session_start_time" name="session_start_time" class="form-control"
            onchange="setSessionStartTime()" required>
        </div>

        <div class="form-group col-md">
          <label for="duration"><span class="text-dark font-weight-bold">Duration<span
                class="text-danger">*</span></label>
          <input type="text" id="duration" name="duration" class="form-control" placeholder="In minutes"
            onChange='setSessionStopTime()' minlength='1' maxlength='2' pattern="[0-9]+" required>
        </div>

        <div class="form-group col-md">
          <label for="session_stop_time"><span class="text-dark font-weight-bold">Session Stop Time<span
                class="text-danger">*</span></label>
          <input type="time" id="session_stop_time" class="form-control" name="session_stop_time" required>
        </div>

        <div class="col-md my-auto mt-4">
          <button type="submit" class="btn text-white btn-success btn-sm px-3 py-2">Add</button>
        </div>
      </div>
    </form>
  </div>
  {{-- End::Add Data --}}


  <h1 class="mt-5">Time Table</h1>
  </form>

  <table class="table border text-center">
    <thead>
      <th>S No.</th>
      <th>Subject</th>
      <th>Faculty</th>
      <th>Session Start</th>
      <th>Duration</th>
      <th>Session End</th>
      <th>Actions</th>
    </thead>
    <tbody>

      {{-- Existing Data --}}
      @foreach($time_tables as $time_table)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>
          @if($subjects)
          <select name="subject_id" class="form-control" disabled>
            <option value="">Select</option>
            @foreach ($subjects as $subject)
            <option value="{{$subject->id}}" {{ $subject->id == $time_table->subject_id ? 'selected' :
              ''}}>{{$subject->name}}</option>
            @endforeach
          </select>
          @endif
        </td>
        <td>
          <select name="faculty_id" class="form-control" disabled>
            <option value="">Select</option>
            @foreach ($faculties as $faculty)
            <option value="{{ $faculty->id }}" {{$faculty->id == $time_table->faculty_id ? 'selected' :
              ''}}>{{$faculty->name}}</option>
            @endforeach
          </select>
        </td>
        <td>
          <input type="time" class="form-control" placeholder="Enter start_time"
            value="{{$time_table->session_start_time ?? NULL}}" disabled>
        </td>
        <td>
          <input type="number" class="form-control" placeholder="In minutes" value="{{$time_table->duration ?? NULL}}"
            disabled>
        </td>
        <td>
          <input type="time" class="form-control" placeholder="Enter stop_time"
            value="{{$time_table->session_stop_time ?? NULL}}" disabled>
        </td>
        <td>
        <td>
          <form action="{{route('time_tables.delete', ['id'=>$time_table->id])}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm form-control">Remove</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@stop


@section('scripts')
<script src="{{ asset('/js/time_table.js') }}" type="text/javascript"></script>
@stop