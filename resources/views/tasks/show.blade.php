@extends('layouts.admin')
@section('content')


@if($task)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">

    <div class="card" style="width: 20rem;" background-color="grey">
  
  <div class="card-body" background-color="grey">
    
    <h5 class="card-title"><b>Name: {{$task->name}}</b></h5></br>
    <h5 class="card-title">description: {{$task->description}}</h5></br>
    <h5 class="card-title">Category: {{ !empty($task->category) ? $task->category->name : '' }}</h5></br> 
    <h5 class="card-title">Status:  @if ($task->status==1)
                    
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