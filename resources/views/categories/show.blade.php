@extends('layouts.admin')
@section('content')



@if($category)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
   
    <h5 class="card-title"><b>Name: {{$category->name}}</b></h5></br>
    <h5 class="card-title">Parent Name:{{$category->parent->name}}</h5></br>
    @if ($category->status==1)
                    
    <h5 class="card-title">Status: Active</h5>    
                 
                @elseif($category->status==0)  
                <h5 class="card-title">Status: Inactive</h5> 
                  
                @endif   
   
  </div>



</div>
    </div>
    <div class="col-4"></div>

</div>
@endif
@endsection