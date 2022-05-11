@extends('_layout')
@section('content')
<div class="container p-5">
  <div class="card col-12">
    <div class="card-header bg-dark text-white h1">
      Dashboard
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md py-5 text-center bg-success bg-gradient mr-3">
          <a class="text-white h4" href="{{route('subjects.index')}}">Subjects</a>
        </div>
        <div class="col-md py-5 text-center bg-primary bg-gradient mr-3">
          <a class="text-white h4" href="{{route('faculties.index')}}">Faculties</a>
        </div>
        <div class="col-md py-5 text-center bg-success bg-gradient mr-3">
          <a class="text-white h4" href="{{route('time_tables.create')}}">Time Table</a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop