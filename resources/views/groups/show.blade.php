@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<li>{{$group->custom_id}}</li>
			<li>{{App\Subject::find($group->subject_id)->title}}</li>
			<li>{{App\SubjectLevel::find($group->level_id)->title}}</li>
			<li>{{App\Tutor::find($group->tutor_id)->full_name}}</li>

			<li>{{App\Classroom::find($group->classroom_id)->room_number}}</li>
			<li>{{$group->weekday}}</li>
			<li>@php echo sprintf('%02d', $group->start_time/60) . ":" . sprintf('%02d', $group->start_time%60); @endphp</li>
			<li>@php echo sprintf('%02d', $group->end_time/60) . ":" . sprintf('%02d', $group->end_time%60); @endphp</li>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<div class="panel panel-default">
					<div class="panel-heading">Students</div>
					<div class="panel-body">

					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="panel panel-default">
					<div class="panel-heading">Lessons</div>
					<div class="panel-body">
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection