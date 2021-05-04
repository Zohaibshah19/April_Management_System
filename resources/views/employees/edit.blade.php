
@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update User </h1>
          </div>
          
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ route('employees.update',$employee->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Update </h3>

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
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$employee->name}}" placeholder="Enter Name">
                    @error('name')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>
                  </div>

                  <div class="col-md-6">

                <div class="form-group">
                  <label for="email"> Email</label>
                  <input name="email" id="email" class="form-control" type="text" value="{{$employee->email}}" class="form-control" placeholder="Enter Email">
                  @error('email')
                  <p style="color:red">{{$message}}</p>
                  @enderror
                </div>
                </div>

                <div class="col-md-6">

                <div class="form-group">
                  <label for="password"> Password</label>
                  <input name="password" id="password" class="form-control" type="password" class="form-control" placeholder="Enter Password">
                  @error('password')
                  <p style="color:red">{{$message}}</p>
                  @enderror
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label for="password"> Confirm Password</label>
                  <input name="confirm_password" id="confirm_password" class="form-control" type="password" class="form-control" placeholder="Retype Password">
                  @error('confirm_password')
                  <p style="color:red">{{$message}}</p>
                  @enderror
                </div>
                </div>
                

                <div class="col-md-6">
                <label>Select User Role</label>
                
                <select class="form-control select2" style="width: 100%;" name='user_role'>
               
                    @if($roles)
                    @foreach($roles as $item)
                        @if($item == $employee->user_role)
                    <option value="{{$item}}" selected>{{$item}}</option>
                        @else
                    <option value="{{$item}}">{{$item}}</option>
                        @endif
                    
                    @endforeach
                    @endif
           
                  </select> 
                  </div>

                  <div class="col-md-6">
                <label>Select Designation</label>
               
                  <select class="form-control select2" style="width: 100%;" name='designation_id'>
                
                    @foreach($data as $item)
                    <option  id='designation_id' value="{{$item->id}}"{{ $item->id == $employee->designation_id ? 'selected="selected"' : '' }}>{{$item->title}}</option>
                    <span style="color:red">@error('designation_id'){{$message}}@enderror</span>
                    
                    @endforeach
           
                  </select> 
                  </div>

                  <div class="col-md-6">
                  <label for="status">Status</label>
                 
                  <div>

                    @if($employee->status==1)
                    <input name="status" id="status"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked>
                    @elseif($employee->status==0)
                    <input name="status" id="status"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >
                    @endif
        </div>
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











