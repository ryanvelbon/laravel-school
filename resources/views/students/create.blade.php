@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Student<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

			<div class="panel-body">

	            <form method="post" action="{{ action('StudentsController@store') }}" accept-charset="UTF-8">
	            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<label for="first-name">First Name</label>
					<input class="form-control" type="text" name="first-name" id="first-name">

					<label for="last-name">Last Name</label>
					<input class="form-control" type="text" name="last-name" id="last-name">

					
					<br>

					<br>

					<label for="sex">Sex</label>
					<select class="form-control" name="sex" id="sex">
						<option value="0">m</option>
						<option value="1">f</option>
					</select>

					<label for="school-year">Form</label>
					<select class="form-control" name="school-year" id="school-year">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
					</select>

					<label for="school">School</label>
					<select class="form-control" name="school" id="school">
						@foreach($schools as $school)
							<option value="{{$school->id}}">{{$school->title}}</option>
						@endforeach
					</select>

					<label for="email-parent">Parent's E-Mail</label>
					<input class="form-control" type="text" name="email-parent" id="email-parent">

					<label for="email-student">Student's E-Mail</label>
					<input class="form-control" type="text" name="email-student" id="email-student">

					<label for="mobile-parent">Parent's Mobile</label>
					<input class="form-control" type="text" name="mobile-parent" id="mobile-parent">

					<label for="email-student">Student's Mobile</label>
					<input class="form-control" type="text" name="mobile-student" id="mobile-student">




					<input type="submit" value="Create">
	            </form>          
	        </div>
	    </div>
	</div>
	<div class="col-sm-6">
		<div class="well well-sm">
			Ignore this.
		</div>
	</div>

</div>

@endsection