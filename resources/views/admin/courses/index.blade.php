@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Courses</h5>
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th >Course</th>
                        <th >Type</th>
                        <th >Priority</th>
                        <th >Year of course</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->type}}</td>
                            <td>{{$course->priority}}</td>
                            <td>
                                {{$course->year->name}}
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
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{route('admin.courses.create')}}" class="mb-2 mr-2 btn btn-success">Add New</a>
    </div>
@endsection
