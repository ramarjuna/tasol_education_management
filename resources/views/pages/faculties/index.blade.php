@extends('_layout')

@section('content')
<div class="container p-6">
  <div class="card col-12 p-5">
    <div class="card-header d-flex justify-content-between">
      <h4>
        Faculties
      </h4>
      <div class="">
        <a href="{{ route('faculties.create') }}" class="btn btn-primary">New Faculty</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <th>Sno</th>
          <th>Name</th>
          <th>Email</th>
        </thead>
        <tbody>
          @foreach($faculties as $faculty)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$faculty->name}}</td>
            <td>{{$faculty->email}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop