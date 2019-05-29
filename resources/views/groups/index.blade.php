@extends('layouts.app')


@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Groups</h3>
        <a href="/groups/create" class="btn btn-primary navbar-btn" role="button">New Group</a>
    </div>
    <div class="panel-body">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(count($groups))

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Group</th>
                    <th>Subject</th>
                    <th>Level</th>
                    <th>Tutor</th>
                    <th>Room</th>
                    <th>Weekday</th>
                    <th>Starts</th>
                    <th>Ends</th>
                    <th>Link</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                  <tr>
                    <td>{{$group->custom_id}}</td>
                    <td>{{App\Subject::find($group->subject_id)->title}}</td>
                    <td>{{App\SubjectLevel::find($group->level_id)->title}}</td>
                    <td>{{App\Tutor::find($group->tutor_id)->full_name}}</td>
                    <td>{{App\Classroom::find($group->classroom_id)->room_number}}</td>
                    <td>{{$weekdays[$group->weekday]}}</td>
                    <td>@php echo sprintf('%02d', $group->start_time/60) . ":" . sprintf('%02d', $group->start_time%60); @endphp</td>
                    <td>@php echo sprintf('%02d', $group->end_time/60) . ":" . sprintf('%02d', $group->end_time%60); @endphp</td>
                    <td><a href="{{ url('/groups', $group->id) }}" class="btn btn-success btn-sm">View Group</a></td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        @else
          <p>No groups found.</p>
        @endif
    </div>
</div>
@endsection