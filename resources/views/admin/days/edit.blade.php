@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title">New Course</h5>
                   <form method="POST" action="{{route('admin.days.update',$day->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label >Day Name:</label>
                       <select class="form-control" name="name" value="{{$day->name}}">
                           <option value="{{$day->name}}">{{$day->name}}</option>
                       <option value="Saturday">Saturday</option>
                       <option value="Sunday">Sunday</option>
                       <option value="Monday">Monday</option>
                       <option value="Tuesday">Tuesday</option>
                       <option value="Wednesday">Wednesday</option>
                       <option value="Thursday">Thursday</option>
                       </select><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                   </form>
                </div>

@endsection
