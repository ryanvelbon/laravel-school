@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
		<h1>Group {{$group->custom_id}}</h1>
		<h3>{{App\SubjectLevel::find($group->level_id)->title}}
			{{App\Subject::find($group->subject_id)->title}}
		<small>with {{App\Tutor::find($group->tutor_id)->full_name}}</small></h3>
		<h6>Every {{$weekdays[$group->weekday]}}
			from @php echo sprintf('%02d', $group->start_time/60) . ":" . sprintf('%02d', $group->start_time%60); @endphp
			to @php echo sprintf('%02d', $group->end_time/60) . ":" . sprintf('%02d', $group->end_time%60); @endphp
			in Room {{App\Classroom::find($group->classroom_id)->room_number}}</h6>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">Students</div>
					<div class="panel-body">
						<table>
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
									<th>Form</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($group->students as $student)
								<tr>
									<td>
									@if($student->profile_pic)
										<img height="50" width="50" src="{{asset('storage/profilepics/').'/'.$student->profile_pic}}">
									@else
										@if($student->sex)
											<img height="50" width="50" src="{{asset('storage/profilepics/').'/'.'f.jpg'}}">
										@else
											<img height="50" width="50" src="{{asset('storage/profilepics/').'/'.'m.jpg'}}">
										@endif
									@endif
									</td>
									<td><a href="{{ url('/students', $student->id) }}">{{$student->first_name}} {{$student->last_name}}</a></td>
									<td align="center">{{$student->form}}</td>
									<td>
										<div class="progress">
									        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
									        aria-valuemin="0" aria-valuemax="100" style="width:40%">
									          40% Complete (success)
									        </div>
									    </div>
									</td>
								</tr>	
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-heading">Lessons</div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>Date</th>
									<th><!-- leave blank --></th>
									<th>Starts</th>
									<th>Ends</th>
									<th>Room</th>
									<th>Description</th>
									<th><!--Edit Buttons--></th>
								</tr>
							</thead>
							<tbody>
								@foreach($group->lessons as $lesson)
								<tr>
									<td>@php echo date('l', strtotime($lesson->starts)); @endphp</td>
									<td>@php echo date('M j', strtotime($lesson->starts)); @endphp</td>
									<td>@php echo date('H:i', strtotime($lesson->starts)); @endphp</td>
									<td>@php echo date('H:i', strtotime($lesson->ends)); @endphp</td>
									<td>{{App\Classroom::find($lesson->classroom_id)->room_number}}</td>
									<td>@php echo  substr($lesson->description, 0, 30); @endphp</td>
									<td><a href="{{ url('/lessons/'.$lesson->id.'/edit') }}" class="btn btn-default btn-sm">Edit</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection