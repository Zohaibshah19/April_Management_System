
















@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update </h1>
          </div>
          
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ route('tasks.update',$task->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Update Task</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
         
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$task->name}}" placeholder="Enter Name">
                    @error('name')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>
</div>
                 
            
                <div class="col-md-6 ">
                <label>Select Category</label>
                  <select class="form-control select2" style="width: 100%;" name='category_id'>
                 
                    @foreach($data as $item)
                   
                    <option  id='category_id' value="{{$item->id}}"{{ $item->id == $task->category_id ? 'selected="selected"' : '' }}>{{$item->name}}</option>
                    <span style="color:red">@error('category_id'){{$message}}@enderror</span>
                    @endforeach
           
                  </select> 
                  </div>

                  <div class="col-md-6 ">

                    <div class="form-group">
                    <label for="section"> Description</label>
                    <textarea type="text" class="form-control" name="description" id="description" value="{{$task->description}}" placeholder="Enter Description">{{$task->description}}</textarea>
                    @error('section')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                    </div>
                    </div>

                  <div class="col-md-6 ">
                  <label for="status">Status</label>
                 
                  <div>

                    @if($task->status==1)
                    <input name="status" id="status"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked>
                    @elseif($task->status==0)
                    <input name="status" id="status"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >
                    @endif
        </div>


               
              </div>
              <!-- /.col -->
             
              <!-- /.col -->
            </div>
            <!-- /.row -->

   

            <!-- /.row -->
          </div>
         
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        
          </div>
    </div>
</form>


        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection











