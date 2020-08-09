@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Edit Course</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.courses.update',$course->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">Course Name:</label>
                       <input type="text" name="name" value="{{$course->name}}" class="form-control"/>
                       <label class="text-light">Type Of Course:</label>
                       <select class="form-control" name="type">
                           <option value="{{$course->type}}">{{$course->type}}</option>

                           <option value="Cours">Course</option>
                           <option value="TD">TD</option>
                           <option value="TP">TP</option>
                       </select>
                       <br/><br/>
                       <input type="submit" value="Save" class="btn btn-green"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
