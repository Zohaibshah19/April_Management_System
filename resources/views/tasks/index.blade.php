@extends('layouts.admin')
@section('content')

@if($messge = Session::get('success'))
<div class='alert alert-success text-center'>{{$messge}}</div>
@endif

  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Task</h1>
       
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
            <section class="content">

                @if(Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tasks</h3>
                <a href="{{route('tasks.create')}}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-success">Add Task</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Status</th>
                    
                    <th>CRUD operation</th>


                  </tr>
                  </thead>
                  @if($tasks)
                  <tbody>
                    @foreach($tasks as $tas)
                  <tr>
    

                    <td class="align-middle">{{$tas->name}}</td>
                    <td class="align-middle">{{$tas->description}} </td>

                    <td class="align-middle">{{ !empty($tas->category) ? $tas->category->name : '' }}</td> 
                    @if ($tas->status==1)
                    
                            <td class="align-middle">Active</td>    
                         
                        @elseif($tas->status==0)  
                            <td class="align-middle">InActive</td> 
                          
                        @endif   
                   

                    <td class='align-middle'>
      <form action="{{route('tasks.destroy',$tas->id)}}" method="POST">
        <a href="{{route('tasks.show',$tas->id)}}" class="fa fa-eye"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="{{route('tasks.edit',$tas->id )}}" class="fa fa-edit"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        
        @csrf
        @method('DELETE')
        <button type="submit" class="fa fa-trash" onclick="return confirm('Are You Sure to DELETE the selected data')"></button>

        

        </form>
 
 

      </td>
                  </tr>
                @endforeach
                  </tbody>
                
                </table>


<br> 
<div class='d-flex'>
<div class='mx-auto'>
{{ $tasks->links('pagination::bootstrap-4') }}
</div>
</div>

             
             @endif </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection