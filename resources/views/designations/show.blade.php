@extends('layouts.admin')
@section('content')


@if($designation)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
    <h5 class="card-title"><b>Name: {{$designation->title}}</b></h5></br>
    
    <h5 class="card-title">Status:  @if ($designation->status==1)
                    
                    <td class="align-middle">Active</td>    
                 
                @elseif($task->status==0)  
                    <td class="align-middle">InActive</td> 
                  
                @endif  </h5></br>
  
  </div>



</div>
    </div>
    <div class="col-4"></div>

</div>
@endif
@endsection