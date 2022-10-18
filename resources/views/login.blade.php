@extends('master')
@section('title',"Home Page")
@section('content')
<div style="margin: 10%;">

<h1 class="red_color">Login With name and phone</h1>

@if( Session('status'))
      
  <div class="alert alert-primary" role="alert">
    {{ Session('status') }}
  </div>
@endif

<form action="{{url('/login_submit')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="text" name="name" value="{{old('name')}}" class="form-control">@error('name'){{$message}}@enderror
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="text" name="phone" value="{{old('phone')}}" class="form-control" >@error('phone'){{$message}}@enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection