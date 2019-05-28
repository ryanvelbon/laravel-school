@extends('layouts.app')





@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Students</h3>
        <a href="/students/create" class="btn btn-primary navbar-btn" role="button">New Student</a>
    </div>
    <div class="panel-body">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(count($students))

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Form</th>
                    <th>School</th>
                    <th>Profile</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                  <tr>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td><?php if($student->sex==0){echo "m";}else{echo "f";} ?></td>
                    <td>{{$student->form}}</td>
                    <td>{{App\School::find($student->school_id)->title}}</td>
                    <td><a href="{{ url('/students', $student->id) }}" class="btn btn-success btn-sm">View Profile</a></td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        @else
          <p>No students found.</p>
        @endif
    </div>
</div>
@endsection