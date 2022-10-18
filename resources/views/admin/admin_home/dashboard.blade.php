@extends('../admin/admin_template/master')
@section('title',"Admin Login Page")
@section('content')

<h1 class="red_color">Admin Dashboard</h1>

{{Session('user_id')}}
{{Session('user_name')}}
{{Session('logged_in')}}

@endsection