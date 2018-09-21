@extends('master')

@section('title')
   Access Denied | Pro Education
@endsection

@section('keywords')
  Access Denied
@endsection  

@section('description')
	Sorry you dont have access to this page   
@endsection

@section('content')
<div class="container" style="margin-top: 25vh;background-color: #e2e2e2;padding: 20px;border-radius: 10px;">
	<div style="text-align: center;">
		<h1><strong>Sorry!</strong></h1>
		<h3>You don't have access to this page</h3>	
		<h5>403, Access Denied</h5>
		<h5 style="padding: 50px;">Click here : <a href="{{url('/dashboard')}}">Home</a> | <a href="#">Contact</a> | <a href="{{ url('/internship') }}">Internships</a> | <a href="#">Workshops</a></h5>
	</div>
</div>
@endsection
