@extends('master')
@section('title',"Home Page")
@section('content')


<div style="margin: 100px 33%">

  {{-- <h2>{{ Session::get('status') }}</h2> --}}

  @if( Session('status'))
      
  
  <div class="alert alert-primary" role="alert">
    {{ Session('status') }}
  </div>
@endif

  <h3 class="red_color">Registration Page</h3>

<form action="{{url('insert_db')}}" method="POST" enctype="multipart/form-data">

  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="sname" class="form-control" placeholder="Enter name"> @error('name'){{$message}}@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Roll Number</label>
    <input type="number" name="rollnumber" class="form-control" placeholder="Enter Roll Number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">phone</label>
    <input type="text" name="phone" class="form-control" placeholder="Uique phone">@error('phone'){{$message}}@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Upload Image</label>
    <input type="file" name="student_image" class="form-control" >
  </div>



  <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>
@endsection