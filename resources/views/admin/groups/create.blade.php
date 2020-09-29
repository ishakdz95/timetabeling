@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title">New Group</h5>
                   <form method="POST" action="{{route('admin.groups.store')}}">
                       @csrf
                       <label >Name Of Group:</label>
                       <input type="form-control text" name="name" class="form-control"/>
                       <label >Section:</label>
                       <select class="form-control " name="section_id">
                           @foreach($sections as $section)
                               <option value="{{$section->id}}">{{$section->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="save" class="mt-1 btn btn-primary"/>
                   </form>
                </div>
@endsection
