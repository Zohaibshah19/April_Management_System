@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update</h1>
          </div>
          
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ route('severitys.update',$severity->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Update</h3>

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
                    <label for="name">title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$severity->title}}">
                    @error('title')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="text" class="form-control" name="due_date" id="due_date" value="{{$severity->due_date}}">
                    @error('due_date')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>

                  <label for="status">Status</label>
                 
                  <div>

                    @if($severity->status==1)
                    <input name="status" id="status"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked>
                    @elseif($severity->status==0)
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
