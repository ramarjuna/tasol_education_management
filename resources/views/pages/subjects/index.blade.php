@extends('_layout')

@section('content')
<div class="container p-6">
  <div class="card col-12">
    <div class="card-header d-flex justify-content-between bg-dark bg-gradient">
      <h4 class="py-3 text-white">Subjects</h4>
      <div>
        <a href="{{ route('subjects.create') }}" class="btn btn-primary py-3">New Subject</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <th>S No.</th>
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