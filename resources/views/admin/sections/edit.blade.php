@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title">Edit Room</h5>
                   <form method="POST" action="{{route('admin.sections.update',$section->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label >Name Of Section:</label>
                       <input type="text" name="name" value="{{$section->name}}" class="form-control" required/>
                       <label >Year :</label>
                       <select class="form-control " name="day_id">
                           @foreach($years as $year)
                               <option value="{{$year->id}}">{{$year->name}}</option>
                           @endforeach

                       </select>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.sections.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>
@endsection
