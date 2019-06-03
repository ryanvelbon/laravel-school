@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					TITLE
				</div>
				<div class="panel-body">
					<form
						name="attendance-form" 
						method="post" 
						action="{{ action('AssignmentsController@assignStore') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<label for="assignment">Assignment</label>
							<select class="form-control" name="assignment" id="assignment">
								@foreach($relevant_assignments as $assignment)
									<option value="{{$assignment->id}}">{{$assignment->custom_id}}</option>
								@endforeach
							</select>

							<a href="{{route('assignments.create')}}">Cannot find assignment you're looking for? Click here to add it!</a>

							<label for="deadline">Deadline</label>
							<input type="date" name="deadline" id="deadline">

							<input type="checkbox" onClick="toggle(this)" />Select All Students<br/>

							<table>
								<thead>
									<tr>
										<th></th>
										<th>Name</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($students as $student)
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
										<td>{{$student->first_name}} {{$student->last_name}}</td>
										<td>
											<input type="checkbox" class="studentCheckbox" name="student_ids[]" value="{{$student->id}}" style="width: 30px; height: 30px;"></input>
										</td>
									</tr>	
									@endforeach
								</tbody>
							</table>
							<input type="submit" value="Assign Students this Task" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-7">
			SPACE....
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByClassName('studentCheckbox');
  console.log(checkboxes);
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
@endsection