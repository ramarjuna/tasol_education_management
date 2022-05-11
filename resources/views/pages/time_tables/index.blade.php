@extends('_layout')
@section('content')
<div class="container">
  <div class="d-flex justify-content-between">
    <div class="h3">Time Table</div>
    <a href="{{route('time_tables.create')}}" class="btn btn-dark">New</a>
  </div>
  <table class="table">
    <div class="thead">
      <tr>
        <th>Subject</th>
        <th>Faculty</th>
        <th>Term</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>Duration</th>
        <th>Stop Time</th>
      </tr>
    </div>
    <div class="tbody">
      @foreach ($time_tables as $item)
      <tr>
        <td>{{$item->subject->name}}</td>
        <td>{{$item->faculty->name}}</td>
        <td>{{$item->term->name}}</td>
        <td>{{$item->date}}</td>
        <td>{{Carbon\Carbon::parse($item->start_time)->format('H:m')}}</td>
        <td>{{$item->duration}}</td>
        <td>{{Carbon\Carbon::parse($item->stop_time)->format('H:m')}}</td>
      </tr>
      @endforeach
    </div>
</div>
@stop