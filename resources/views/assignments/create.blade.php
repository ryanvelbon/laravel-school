@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">New Assignment<a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

			<div class="panel-body">

	            <form method="post" action="{{ action('AssignmentsController@store') }}" accept-charset="UTF-8">
	            	<input type="hidden" name="_token" value="{{ csrf_token() }}">

					


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