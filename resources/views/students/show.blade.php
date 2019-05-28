@extends('layouts.app')

@section('content')
	<a class="btn btn-default" href="/">Go Back</a>
	<h1>{{$student->first_name}} {{$student->last_name}}</h1>
	<hr>
	<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<br><br>
	<a href="/students/{{$student->id}}/edit" class="btn btn-default">Edit</a>
	<a href="#" class="btn btn-danger pull-right">Update Status</a>

	<div class="container">
		<!-- DETAILS -->
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Bio</h3></div>
					<div class="panel-body">
						bio details
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Contact Details</h3></div>
					<div class="panel-body">
<table class="table">
	<tr>
      <th>Parent's email</th>
      <td>{{$student->email1}}</td>
    </tr>
    <tr>
      <th>Student's email</th>
      <td>{{$student->email2}}</td>
    </tr>
    <tr>
      <th>Parent's Mobile</th>
      <td>{{$student->mob1}}</td>
    </tr>
    <tr>
      <th>Student's Mobile</th>
      <td>{{$student->mob2}}</td>
    </tr>
</table>
					</div>
				</div>
			</div>
		</div>
		<!-- RECORD -->
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Payments</h3></div>
					<div class="panel-body">
						bio details
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Performance</h3></div>
					<div class="panel-body">
						bio details
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection