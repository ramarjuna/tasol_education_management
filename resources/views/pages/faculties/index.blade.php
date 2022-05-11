@extends('_layout')

@section('content')
<div class="container">
  <div class="card col-12">
    <div class="card-header d-flex justify-content-between bg-dark bg-gradient">
      <h4 class="py-3 text-white">Faculties</h4>
      <div>
        <a href="{{ route('faculties.create') }}" class="btn btn-primary py-3">New Faculty</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <th>S No.</th>
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