@extends('layouts.master')

@section('main-section')
    <div class="card-body"><h5 class="card-title text-site">New Section</h5>
                   <form method="POST" action="{{route('admin.sections.store')}}">
                       @csrf
                       <label class="text-light">Name Of Section:</label>
                       <input type="text" name="name" class="form-control" required/>
                       <label class="text-light" >Year:</label>
                       <select class="form-control  " name="year_id">
                           @foreach($years as $year)
                               <option value="{{$year->id}}">{{$year->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.sections.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>
@endsection
