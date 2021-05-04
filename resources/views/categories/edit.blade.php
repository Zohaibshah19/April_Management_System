@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Categories</h1>
          </div>
          
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Update Categories</h3>

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
                    <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                    @error('name')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>
    </div>
                  <div class="col-md-6">
            
            <label>Select Parent Category</label>

            <select class="form-control select2 @if($errors->has('parent_id')) is-invalid @endif" style="width: 100%;" name='parent_id'>
            <option class="default disabled selected">Choose Parent</option>
                @foreach($data as $item)
                <option  id='severity_id' value="{{$item->id}}"{{ $item->id == $category->parent_id ? 'selected="selected"' : '' }}>{{$item->name}}</option>
                <span style="color:red">@error('parent_id'){{$message}}@enderror</span>
                
                @endforeach

            </select> 

</div>

<div class="col-md-6">
                  <label for="status">Status</label>
                 
                  <div>

@if($category->status==1)
<input name="status" id="status"  class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked>
@elseif($category->status==0)
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
