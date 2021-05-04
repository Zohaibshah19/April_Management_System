
@extends('layouts.admin')
@section('content')


<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.9/adapters/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<style>
      /* apply CSS to the select tag of 
         .dropdown-container div*/
  
      .dropdown-container select {
        /* for Firefox */
        -moz-appearance: none;
        /* for Safari, Chrome, Opera */
        -webkit-appearance: none;
      }
  
      /* for IE10 */
      .dropdown-container select::-ms-expand {
        display: none;
      }
    </style>

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
        <form action="{{route('incidents.update',$incident->id)}}" method="POST" enctype="multipart/form-data">
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
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject" value="{{$incident->subject}}">
                    @error('subject')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  </div>
                  </div>

                  <div class="col-md-6">
                <div class="form-group">
                  <label for="start_date"> Start Date</label>
                  <input name="start_date" id="start_date" class="form-control date" autocomplete='off' type="text" class="form-control" placeholder="Enter Start Date" value="{{$incident->start_date}}">
                  @error('start_date')
                  <p style="color:red">{{$message}}</p>
                  @enderror
                  <script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  
</script> 
                </div>
                </div>

               

                <div class="col-md-6 dropdown-container">
                <label>Select Status</label>
                
                <select class="form-control @if($errors->has('status')) is-invalid @endif" style="width: 100%;" name='status' value="{{$incident->status}}">
                
                    @if($stat)
                    @foreach($stat as $item)
                    @if($item == $incident->status)
                    <option value="{{$item}}" selected>{{$item}}</option>
                        @else
                    <option value="{{$item}}">{{$item}}</option>
                        @endif
                    
                    @endforeach
                    
                  
                    @endif


                  </select> 

                

                </div>
                
           
                  <div class="col-md-6 dropdown-container">

            
                <label>Select Severity</label>
                
                  <select class="form-control @if($errors->has('severity_id')) is-invalid @endif" style="width: 100%;" name='severity_id'>
                  <option class="default disabled selected">Choose Severity</option>
                    @foreach($data as $item)
                    <option  id='severity_id' value="{{$item->id}}"{{ $item->id == $incident->severity_id ? 'selected="selected"' : '' }}>{{$item->title}}</option>
                    <span style="color:red">@error('severity_id'){{$message}}@enderror</span>
                    
                    @endforeach
           
                  </select> 
                  </div>



                  

                  <div class="col-md-12">
                  
                  <div class="form-group">
            <label>Select User(s)</label>
                  <select multiple  class="form-control @if($errors->has('severity_id')) is-invalid @endif" style="width: 100%;" name='user_id[]' >
                    @foreach($dat as $item)
                    <option  id='user_id' value="{{$item->id}}">{{$item->name}}</option>
                    <span style="color:red">@error('user_id'){{$message}}@enderror</span>
                    @endforeach
                   
           
                  </select> 
</div>


               
              </div>

              <div class="col-md-12">

             <div class="form-group">
        <label for="description"> Description</label>
        <textarea name="description" id="description"  type="text" class="form-control" placeholder="Enter Description" value="{{$incident->description}}">{{$incident->description}}</textarea>
        @error('description')
        <p style="color:red">{{$message}}</p>
        @enderror
        </div>
        </div>

        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
                    <script>
                  CKEDITOR.replace('description');
                     </script>
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











