@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Courses</div>

                <div class="card-body">
                    <a href="{{route('admin.courses.create')}}" class="btn btn-green">Add new course</a>
                    <br><br><br>
                    <table class="table">
                        <tr>
                            <th class="text-light">Course</th>
                            <th class="text-light">Type</th>
                            <th class="text-light">Priority</th>
                            <th class="text-light">Year of course</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($courses as $course)
                            <tr>
                                <td class="text-light">{{$course->name}}</td>
                                <td class="text-light">{{$course->type}}</td>
                                <td class="text-light">{{$course->priority}}</td>
                                <td class="text-light">
                                    {{$course->year->name}}
                                </td>
                                <td class="text-light">
                                    @foreach($course->timeslots as $timeslot)
                                        {{$timeslot->name}}
                                        {{$timeslot->day->name}}
                                    @endforeach
                                </td>
                                <td><a href="{{route('admin.courses.edit',$course->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.courses.destroy',$course->id)}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                    </form>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-light" colspan="2"> no courses found.</td>
                            </tr>
                        @endforelse
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
