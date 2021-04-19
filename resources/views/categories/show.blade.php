@extends('layouts.admin')
@section('content')



@if($category)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
   
    <h5 class="card-title"><b>Name: {{$category->name}}</b></h5></br>
    <h5 class="card-title">Status: {{$category->status}}</h5></br>
   
  </div>



</div>
    </div>
    <div class="col-4"></div>

</div>
@endif
@endsection