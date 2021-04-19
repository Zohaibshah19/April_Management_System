@extends('layouts.admin')
@section('content')


@if($employee)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
    <h5 class="card-title"><b>Name: {{$employee->full_name}}</b></h5></br>
    <h5 class="card-title">Email: {{$employee->email}}</h5></br>
    <h5 class="card-title">User Role: {{$employee->user_role}}</h5></br>
    <h5 class="card-title">designation: {{$employee->designation->title}}</h5></br>
    <h5 class="card-title">Status: {{$employee->status}}</h5></br>

  
  </div>



</div>
    </div>
    <div class="col-4"></div>

</div>
@endif
@endsection