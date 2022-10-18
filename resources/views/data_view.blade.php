@extends('master')
@section('title',"Home Page")
@section('content')
<h1 class="red_color">Data View Page</h1>


@if( Session('status'))
      
  
<div class="alert alert-primary" role="alert">
  {{ Session('status') }}
</div>
@endif

<table class="table table-striped" id="example">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Roll Numer</th>
        <th scope="col">Phone</th>
        <th scope="col">image</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>

    @foreach ($data as $item)

      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->rollno}}</td>
        <td>{{$item->phone}}</td>
        <td><img src="{{asset('img_upload/'.$item->photo)}}" width="70" height="70" /></td>
        <td><a href="{{url('delete/'.$item->id)}}" class="btn btn-danger">Delete</a> | 
            <a href="{{url('update/'.$item->id)}}" class="btn btn-success">Update</a></td>

    </tr>

    @endforeach
    </tbody>
  </table>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection