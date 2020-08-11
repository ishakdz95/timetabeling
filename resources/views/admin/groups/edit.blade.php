@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Edit Group</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.groups.update',$group->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">Group Name:</label>
                       <input type="text" name="name" value="{{$group->name}}" class="form-control"/>
                       <select class="form-control " name="section_id">
                           <option value="{{$group->section->id}}">{{$group->section->name}}</option>
                           @foreach($sections as $section)
                               <option value="{{$section->id}}">{{$section->name}}</option>
                           @endforeach

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
