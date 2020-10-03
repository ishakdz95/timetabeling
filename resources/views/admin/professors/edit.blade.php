@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title">Edit Professor</h5>
                   <form method="POST" action="{{route('admin.professors.update',$professor->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label >First Name:</label>
                       <input type="text" name="first_name" value="{{$professor->first_name}}" class="form-control" required/>
                       <label >Last Name:</label>
                       <input type="text" name="last_name" value="{{$professor->last_name}}" class="form-control" required/>
                       <label >Grade:</label>
                       <input type="text" name="grade" value="{{$professor->grade}}" class="form-control" required/>
                       <label >Type:</label>
                       <input type="text" name="type" value="{{$professor->type}}" class="form-control" required/>
                       <label >Sex:</label>
                       <input type="text" name="sex" value="{{$professor->sex}}" class="form-control" required/>
                       <br/><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.professors.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>


@endsection
