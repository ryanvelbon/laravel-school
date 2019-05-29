@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<li>{{$group->custom_id}}</li>
			<li>{{App\Subject::find($group->subject_id)->title}}</li>
			<li>{{App\SubjectLevel::find($group->level_id)->title}}</li>
			<li>{{App\Tutor::find($group->tutor_id)->full_name}}</li>

			<li>{{App\Classroom::find($group->classroom_id)->room_number}}</li>
			<li>{{$weekdays[$group->weekday]}}</li>
			<li>@php echo sprintf('%02d', $group->start_time/60) . ":" . sprintf('%02d', $group->start_time%60); @endphp</li>
			<li>@php echo sprintf('%02d', $group->end_time/60) . ":" . sprintf('%02d', $group->end_time%60); @endphp</li>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">Students</div>
					<div class="panel-body">
						<table>
							<thead>
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($group->students as $student)
								<tr>
									<td>{{$student->first_name}}</td>
									<td>{{$student->last_name}}</td>
									<td>{{$student->form}}</td>
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
									<td>@php echo date('M d', strtotime($lesson->starts)); @endphp</td>
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