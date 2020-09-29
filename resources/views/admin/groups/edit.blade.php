@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title">Edit Group</h5>
                   <form method="POST" action="{{route('admin.groups.update',$group->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label>Group Name:</label>
                       <input type="text" name="name" value="{{$group->name}}" class="form-control"/>
                       <label>Section Name:</label>
                       <select class="form-control " name="section_id">
                           <option value="{{$group->section->id}}">{{$group->section->name}}</option>
                           @foreach($sections as $section)
                               <option value="{{$section->id}}">{{$section->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                   </form>
                </div>
@endsection
