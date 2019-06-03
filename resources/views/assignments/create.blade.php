@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Assignment<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

			<div class="panel-body">

	            <form method="post" action="{{ action('AssignmentsController@store') }}" accept-charset="UTF-8">
	            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	            	<label for="title">Title</label>
					<input class="form-control" type="text" name="title" id="title">

					<label for="assignment-type">Type</label>
					<select class="form-control" name="assignment-type" id="assignment-type">
						@foreach($types as $type)
							<option value="{{$type->id}}">{{$type->title}}</option>
						@endforeach
					</select>

					<label for="marks-available">Marks Available</label>
					<select class="form-control" name="marks-available" id="marks-available">
						@foreach($weightings as $weighting)
							<option value="{{$weighting}}">{{$weighting}}</option>
						@endforeach
					</select>

					<label for="pass-mark">Pass Mark</label>
					<input type="number" name="pass-mark">

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