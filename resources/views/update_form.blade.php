@extends('master')
@section('title',$title)
@section('content')




<div style="margin: 100px 33%">


  <h3 class="red_color">Update Page</h3>

<form action="{{url('Edit/'.$record_student->id)}}" method="POST" enctype="multipart/form-data">

  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="sname" class="form-control" value="{{$record_student->name}}" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Roll Number</label>
    <input type="number" name="rollnumber"  value="{{$record_student->rollno}}"  class="form-control" placeholder="Enter Roll Number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">phone</label>
    <input type="text" name="phone" value="{{$record_student->phone}}" class="form-control" placeholder="Enter phone">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Old Image</label>
    <img src="{{asset('img_upload/'.$record_student->photo)}}" width="70" height="70" />
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Upload Image</label>
    <input type="file" name="student_image" class="form-control" >
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection