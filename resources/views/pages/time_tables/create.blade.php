@extends('_layout')
@section('content')


<div class="d-flex justify-content-between">

  <!-- begin::Alert Message -->
  @if(session('message'))
  <div class="alert alert-success alert-dismissible">
    <strong>Success!</strong> {{session('message')}}.
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  @endif
  <!-- end::Alert Message -->


  <h1>Add Time Table</h1>
  <div class="">
    <a href="{{ route('time_tables.index') }}" class="btn btn-dark">Index</a>
  </div>
</div>

{{-- <form> --}}
  {{-- <div class="card row">
    <div class="form-group">
      <label for="" class="form-label col-2">Term
        <select name="term_id" id="" wire:model="term_id" class="form-control col-4">
          <option value="" selected>Select</option>
          @foreach ($terms as $term)
          <option value="{{ $term->id }}">{{ $term->name }}</option>
          @endforeach
        </select>
        @error('term_id')
        <span class="text-danger error">{{ $message }}</span>
        @enderror
      </label>
      <label for="" class="form-label col-2 ml-2">Date
        <input type="date" wire:model="date" class="form-control col-4">
        @error('date')
        <span class="text-danger error">{{ $message }}</span>
        @enderror
      </label>
    </div>
  </div> --}}

  {{-- Start::Add Data --}}
  <form action="{{route('time_tables.store')}}" method="POST" enctype="multipart/form-data" onSubmit=validateFields();>
    <div class="row">
      @csrf
      <div class="form-group col-md">
        <label for="subject"><span class="text-dark font-weight-bold">Subject<span class="text-danger">*</span></label>
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
        <label for="faculty"><span class="text-dark font-weight-bold">Faculty<span class="text-danger">*</span></label>
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
      {{-- <td>Create Time Table --}}

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

        <div class="col-md">
          <button type="submit" class="btn text-white btn-success btn-sm">Add</button>
        </div>
    </div>
  </form>
  {{-- End::Add Data --}}


  <h1 class="mt-5">Scheduled</h1>
</form>

<table class="table">
  <thead>
    <th>Sno</th>
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
      <td class="col-md">
        <form action="{{route('time_tables.delete', ['id'=>$time_table->id])}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">Remove</button>
        </form>
      </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-success btn-sm">Submit</button>
  </div>
</div>


@stop


@section('scripts')
{{-- <script src="{{ asset('/js/pages/registration/metadata_control.js') }}" type="text/javascript"></script> --}}
<script>
  function setSessionStartTime(duration=null){
    if(duration != null){
        stopSessionEl = $("#session_stop_time");
        startSessionEl = $("#session_start_time");
        stopSessionTime = $("#session_stop_time").val();
        startSession = $("#session_start_time").val();
        if (startSession !== "") {
          var startSessionHours = startSession.split(":")[0];
          var startSessionMinutes = startSession.split(":")[1];
          var todaysDate = new Date();
          todaysDate.setHours(startSessionHours);
          todaysDate.setMinutes(startSessionMinutes);
          var add_minutes = function (todaysDate, duration) {
        return new Date(todaysDate.getTime() + duration*60000);
        }
        console.log(add_minutes(todaysDate, duration));
      return add_minutes(todaysDate, duration);
        }
    }else{
      setSessionStopTime();
    }
}

    function setSessionStopTime(){
      var duration = $('#duration').val();
      var result = setSessionStartTime(duration)
      setSessionStopTimeValue(result);
    }

    function setSessionStopTimeValue(time){
      time = new Date(time);
      sessionStopHours = time.getHours();
      sessionStopMinutes = time.getMinutes();
      
      // 0's are skipped in javascript, so prepending 0 for hours and minutes
      if(sessionStopMinutes.toString().length == 1){
        sessionStopMinutes = '0' + sessionStopMinutes;
      }
      if(sessionStopHours.toString().length == 1){
      sessionStopHours = '0' + sessionStopHours;
      }
      sessionStopValue = sessionStopHours + ':' + sessionStopMinutes;
      document.getElementById("session_stop_time").value = sessionStopValue;
      document.getElementById("session_stop_time").disabled = true;
    }

    function validateFields(){
      // Enable Session End Time before form submit
      document.getElementById("session_stop_time").disabled = false;
    }
</script>
@stop