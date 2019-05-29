@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">New Group<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

	<div class="panel-body">

        <form method="post" action="{{ action('GroupsController@store') }}" accept-charset="UTF-8">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">


			
			<br>

			<br>
			

			<label for="subject">Subject</label>
			<select class="form-control" name="subject" id="subject">
				@foreach($subjects as $subject)
					<option value="{{$subject->id}}">{{$subject->title}}</option>
				@endforeach
			</select>

			<label for="subject-level">Subject Level</label>
			<select class="form-control" name="subject-level" id="subject-level">
				@foreach($levels as $level)
					<option value="{{$level->id}}">{{$level->title}}</option>
				@endforeach
			</select>

			<label for="tutor">Tutor</label>
			<select class="form-control" name="tutor" id="tutor">
				@foreach($tutors as $tutor)
					<option value="{{$tutor->id}}">{{$tutor->full_name}}</option>
				@endforeach
			</select>

			

			<label for="day">Day</label>
			<select class="form-control" name="day" id="day">
					<option value="0">Monday</option>
					<option value="1">Tuesday</option>
					<option value="2">Wednesday</option>
					<option value="3">Thursday</option>
					<option value="4">Friday</option>
					<option value="5">Saturday</option>
			</select>

			<label for="start-time">Start Time</label>
			<select class="form-control" name="start-time" id="start-time">
				<?php 
					for ($h = 8; $h <= 20; $h++) {
					    echo '<option value="'. $h*60 .'">'.$h.':00</option>';
					} 
				?>
			</select>

			<label for="duration">Duration</label>
			<select class="form-control" name="duration" id="duration">
				<option value="60">1 hour</option>
				<option value="90">1.5 hours</option>
				<option value="120">2 hours</option>
				<option value="150">2.5 hours</option>
				<option value="180">3 hours</option>
			</select>

			<label for="room">Classroom</label>
			<select class="form-control" name="room" id="room">
				@foreach($classrooms as $classroom)
					<option value="{{$classroom->id}}">{{$classroom->room_number}}</option>
				@endforeach
			</select>

			<input type="submit" value="Create">
        </form>          
    </div>
</div>
@endsection