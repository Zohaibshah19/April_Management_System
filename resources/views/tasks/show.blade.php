@extends('layouts.admin')
@section('content')
<h1> Details </h1>

@if($task)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
    <h5 class="card-title"><b>Name: {{$task->name}}</b></h5></br>
    <h5 class="card-title">description: {{$task->description}}</h5></br>
    <h5 class="card-title">Status: {{$task->status}}</h5></br>
  
  </div>



</div>
    </div>
    <div class="col-4"></div>

</div>
@endif
@endsection