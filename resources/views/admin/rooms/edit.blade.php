@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title text-site">Edit  {{$room->code}}</h5>
                   <form method="POST" action="{{route('admin.rooms.update',$room->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">Code Of Room:</label>
                       <input type="text" name="code" value="{{$room->code}}" class="form-control" required/>
                       <br/>
                       <label  class="text-light">Type Of Room:</label>
                       <select class="form-control" name="type" required>
                           <option value="{{$room->type}}">{{$room->type}}</option>
                           <option value="Cours">lecture hall</option>
                           <option value="TD">TD room</option>
                           <option value="TP">laboratory</option>
                       </select>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.rooms.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>
@endsection
