@extends('layouts.master')

@section('main-section')
    <div class="card-body"><h5 class="card-title">Edit Year</h5>
                   <form method="POST" action="{{route('admin.years.update',$year->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label >Year:</label>
                       <input type="text" name="name" value="{{$year->name}}" class="form-control"/>
                       <br/><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.years.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
    </div>
@endsection
