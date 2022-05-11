@extends('_layout')

@section('content')
<div class="container p-6">
  <div class="card col-6 p-6">
    <div class="card-header d-flex justify-content-between">
      <h4>
        Subjects
      </h4>
      <div class="">
        <a href="{{ route('subjects.create') }}" class="btn btn-primary">New Subject</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <th>Sno</th>
          <th>Subject</th>
          <th>Term</th>
        </thead>
        <tbody>
          @foreach($subjects as $subject)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$subject->name}}</td>
            <td>{{$subject->term->name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop