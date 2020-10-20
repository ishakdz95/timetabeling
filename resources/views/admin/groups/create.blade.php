@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title text-site">New Group</h5>
                   <form method="POST" action="{{route('admin.groups.store')}}">
                       @csrf
                       <label class="text-light">Name Of Group:</label>
                       <input type="form-control text" name="name" class="form-control" required/>
                       <label class="text-light">Section:</label>
                       <select class="form-control " name="section_id" required>
                           @foreach($sections as $section)
                               <option value="{{$section->id}}">{{$section->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.groups.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>
@endsection
