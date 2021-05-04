@extends('layouts.admin')
@section('content')



@if($location)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
   
    <h5 class="card-title"><b>Name: {{$location->name}}</b></h5></br>
    @if ($location->status==1)
                    
                    <td class="align-middle">Status: Active</td>    
                 
                @elseif($location->status==0)  
                    <td class="align-middle">Status: Inactive</td> 
                  
                @endif 
   
  </div>



</div>
    </div>
    <div class="col-4"></div>

</div>
@endif
@endsection