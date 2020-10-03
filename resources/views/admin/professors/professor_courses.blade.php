@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title">New Professor</h5>
        <form method="GET" action="{{route('attache_professor_course')}}">
            @csrf
            <input type="hidden" name="id" value="{{$professor->id}}">
            <input name="first_name" value="{{$professor->first_name}}" class="form-control" readonly><br>
            <input name="first_name" value="{{$professor->last_name}}" class="form-control" readonly><br>
            <input name="first_name" value="{{$professor->grade}}" class="form-control" readonly><br>
            <input name="first_name" value="{{$professor->sex}}" class="form-control" readonly><br>
            <br/>

            <label >Select a course:</label>
            <select class="form-control " name="course_id">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach

            </select>
            <input  type="submit" value="submit" class="mt-1 btn btn-primary"/>
        </form>
    </div>
@endsection

