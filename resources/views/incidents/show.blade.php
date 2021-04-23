@extends('layouts.admin')
@section('content')


@if($incident)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
    <h5 class="card-title"><b>Subject: {{$incident->subject}}</b></h5></br>
    <h5 class="card-title">Status: {{$incident->status}}</h5></br>
    <h5 class="card-title">Start Date: {{$incident->start_date}}</h5></br>
    <h5 class="card-title">Description: {{$incident->description}}</h5></br>
    <h5 class="card-title">Severity:  {{$incident->severity->title}}</h5></br>
    <h5 class="card-title">User(s):  {{$incident->user->name}}</h5></br>


  
  </div>



</div>
    </div>
    <div class="col-4"></div>

</div>
@endif
@endsection