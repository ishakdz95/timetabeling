@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title text-site">Attache courses to Professor {{$professor->last_name}} {{$professor->first_name}}</h5>
        <form method="GET" action="{{route('attache_professor_course')}}">
            @csrf
            <input type="hidden" name="id" value="{{$professor->id}}">
            <input name="first_name" value="{{$professor->first_name}}" class="form-control" readonly><br>
            <input name="first_name" value="{{$professor->last_name}}" class="form-control" readonly><br>
            <input name="first_name" value="{{$professor->grade}}" class="form-control" readonly><br>
            <input name="first_name" value="{{$professor->sex}}" class="form-control" readonly><br>
            <br/>

            <label class="text-light">Select a course:</label>
            <select class="form-control " name="course_id">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach

            </select>
            <br>
            <label class="text-light">Courses already attached</label>
            @foreach($professor->courses as $course)
                <input class="form-control" value="{{$course->name}}"readonly><br>
            @endforeach

            <input  type="submit" value="attach" name="button_1" class="mt-1 btn btn-info"/>
            <input  type="submit" value="detach" name="button_1" class="mt-1 btn btn-danger"/>
        </form>
    </div>
@endsection

