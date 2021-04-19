
@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add </h1>
          </div>
          
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add </h3>

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
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Task">
                    @error('name')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>


                <div class="form-group">
                  <label for="section"> Description</label>
                  <textarea name="description" id="description" class="form-control" rows="3" type="text" class="form-control" placeholder="Enter Description"></textarea>
                  @error('description')
                  <p style="color:red">{{$message}}</p>
                  @enderror
                </div>

            
                <label>Select Category</label>
                
               
                  <select class="form-control select2" style="width: 100%;" name='category_id'>
                  <option value="">select Category</option>
                    @foreach($data as $item)
                    
                    <option  id='category_id' value="{{$item->id}}">{{$item->name}}</option>
                    <span style="color:red">@error('category_id'){{$message}}@enderror</span>
                    
                    @endforeach
           
                  </select> 
                  

                  <label for="status">Status</label>
                 
                 <div>
                       <input name="status" id="status"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >
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











