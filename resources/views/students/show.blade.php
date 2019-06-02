@extends('layouts.app')

@section('content')
	<a class="btn btn-default" href="/">Go Back</a>
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
		<!-- 1st ROW------------------------------------------------------------>
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>{{$student->first_name}} {{$student->last_name}}</h1></div>
					<div class="panel-body">
						<div class="col-sm-6">
							@if($student->profile_pic)
								<img height="200" width="200" src="{{asset('storage/profilepics/').'/'.$student->profile_pic}}">
							@else
								@if($student->sex)
									<img height="200" width="200" src="{{asset('storage/profilepics/').'/'.'f.jpg'}}">
								@else
									<img height="200" width="200" src="{{asset('storage/profilepics/').'/'.'m.jpg'}}">
								@endif
							@endif
							<form 
								name="change-pic" 
								method="post" 
								action="{{ action('StudentsController@changePic', ['id' => $student->id]) }}" 
								enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="file" name="profile_pic" id="profile_pic">
									<!-- <input type="hidden" name="_method" value="put" /> -->
									<input type="submit" value="Submit">
							</form>
						</div>
						<div class="col-sm-6">
							<table class="table">
							  <tr>
							    <th>School</td>
							    <td>{{App\School::find($student->school_id)->title}}</td>
							  </tr>
							  <tr>
							    <th>Form</td>
							    <td>@if($student->form == 0)
							    		Mature Student
							    	@else
							    		{{$student->form}}
							    	@endif
							    </td>
							  </tr>
							  <tr>
							    <th>Status</td>
							    <td></td>
							  </tr>
							  <tr>
							    <th></td>
							    <td></td>
							  </tr>
							  <tr>
							    <th></td>
							    <td></td>
							  </tr>
							</table>
						</div>
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
		<!-- 2nd ROW---------------------------------------------------------- -->
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Payments</h3></div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>Amount Paid</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach($payments as $payment)
								<tr>
									<td>€{{$payment->amount}}</td>
									<td>{{$payment->date}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						
						<div id="paymentForm" style="display: none;">
							<form
								name="add-payment" 
								method="post" 
								action="{{ action('PaymentsController@store', ['id' => $student->id]) }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="number" name="amount" id="amount">
									<input type="date" name="payment-date" id="payment-date">
									<input type="submit" value="Submit" class="btn btn-primary">
							</form>
							
						</div>

						<a onclick="toggleDisplayOfPaymentForm()" class="btn btn-default pull-right" id="addPaymentBtn">Add a Payment</a>

					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Performance</h3></div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($student->assignments as $assignment)
								<tr>
									<td>{{App\Subject::find($assignment->subject_id)->title}}</td>
									<td>{{$assignment_types[$assignment->type]}}</td>
									<td>
										<sup>
											{{$mark = $student->assignments()->findOrFail($assignment->id, ['assignment_id'])->pivot->mark}}
										</sup>⁄
										<sub>
											{{$assignment->marks_available}}
										</sub>
									</td>
									<td><span class="label 
										@if($mark > $assignment->pass_mark)
											label-success
										@else
											label-danger
										@endif">
										{{(int)(($mark/$assignment->marks_available)*100)."%"}}
									</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Courses Enrolled For and Attendance</h3></div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>Group</th>
								<th>Date Joined</th>
							</tr>
						</thead>
						<tbody>
							@foreach($student->groups as $group)
							<tr>
								<td><a href="{{ url('/groups', $group->id) }}">{{$group->custom_id}}</a></td>
								<td></td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<div id="groupForm" style="display: none;">
						<form
							name="add-group" 
							method="post" 
							action="{{ action('StudentsController@joinGroup', ['student_id' => $student->id]) }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<label for="group-to-join">Add {{$student->first_name}} to Group</label>
								<select class="form-control" name="group-to-join" id="group-to-join">
									@foreach($groups_not_part_of as $group)
										<option value="{{$group->id}}">{{$group->custom_id}}</option>
									@endforeach
								</select>

								<input type="submit" value="Submit" class="btn btn-primary">
						</form>
						
					</div>

					<a onclick="toggleDisplayOfGroupForm()" class="btn btn-default pull-right" id="joinGroupBtn">Add to New Group</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Reports</h3></div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>Date</th>
								<th>Type</th>
								<th>Text</th>
							</tr>
						</thead>
						<tbody>
							@foreach($student->reports as $report)
							<tr>
								<td>{{$report->date}}</td>
								<td>{{App\ReportType::find($report->report_type_id)->title}}</td>
								<td>{{$report->text}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<div id="reportForm" style="display: none;">
						<form
							name="make-report" 
							method="post" 
							action="{{ action('StudentsController@receiveReport', ['student_id' => $student->id]) }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<label for="report-type">Report {{$student->first_name}}</label>
								<select class="form-control" name="report-type" id="report-type">
									@foreach(App\ReportType::all() as $report_type)
										<option value="{{$report_type->id}}">{{$report_type->title}}</option>
									@endforeach
								</select>

								<input type="text" name="text" id="text">

								<input type="date" name="report-date" id="report-date">

								<input type="submit" value="Submit" class="btn btn-primary">
						</form>
						
					</div>

					<a onclick="toggleDisplayOfReportForm()" class="btn btn-default pull-right" id="makeReportBtn">Make a Report</a>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
<script type="text/javascript">
	function toggleDisplayOfPaymentForm() {

		// Selects today's date as default
		document.querySelector("#payment-date").valueAsDate = new Date();
		
		var form = document.getElementById("paymentForm");
		var btn = document.getElementById("addPaymentBtn");

		if (form.style.display === "none") {
			form.style.display = "block";
			// btn.class = "btn btn-danger";
			btn.innerHTML = "Cancel";
		} else {
			form.style.display = "none";
			// btn.class = "btn btn-default";
			btn.innerHTML = "Add a Payment";
		}
	}

	function toggleDisplayOfGroupForm() {
		
		var form = document.getElementById("groupForm");
		var btn = document.getElementById("joinGroupBtn");

		if (form.style.display === "none") {
			form.style.display = "block";
			// btn.class = "btn btn-danger";
			btn.innerHTML = "Cancel";
		} else {
			form.style.display = "none";
			// btn.class = "btn btn-default";
			btn.innerHTML = "Add to Group";
		}
	}

	function toggleDisplayOfReportForm() {

		// Selects today's date as default
		document.querySelector("#report-date").valueAsDate = new Date();
		
		var form = document.getElementById("reportForm");
		var btn = document.getElementById("makeReportBtn");

		if (form.style.display === "none") {
			form.style.display = "block";
			// btn.class = "btn btn-danger";
			btn.innerHTML = "Cancel";
		} else {
			form.style.display = "none";
			// btn.class = "btn btn-default";
			btn.innerHTML = "Make Report";
		}
	}
</script>
@endsection