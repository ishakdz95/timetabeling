@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title text-site">Edit {{$group->name}}</h5>
                   <form method="POST" action="{{route('admin.groups.update',$group->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">Group Name:</label>
                       <input type="text" name="name" value="{{$group->name}}" class="form-control" required/>
                       <label class="text-light">Section Name:</label>
                       <select class="form-control " name="section_id" required>
                           <option value="{{$group->section->id}}">{{$group->section->name}}</option>
                           @foreach($sections as $section)
                               <option value="{{$section->id}}">{{$section->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.groups.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>
@endsection
