@extends('layouts.app')


@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Schools</h3>
    </div>
    <div class="panel-body">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(count($schools))

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>School</th>
                    <th>Type</th>
                    <th>Students with Us</th>
                    <th>Half-Yearly Exams Start</th>
                    <th>Annual Exams Start</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($schools as $school)
                  <tr>
                    <td>{{$school->title}}</td>
                    <td>{{$school_types[$school->school_type]}}</td>
                    <td>{{$school->students->count()}}</td>
                    <td>@php echo date("F j, Y", strtotime($school->exam_date_hy)); @endphp</td>
                    <td>@php echo date("F j, Y", strtotime($school->exam_date_annual)); @endphp</td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        @else
          <p>No schools found.</p>
        @endif
    </div>
</div>
@endsection