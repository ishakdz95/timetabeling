@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Add New Section</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.sections.store')}}">
                       @csrf
                       <label class="text-light">Name Of Section:</label>
                       <input type="text" name="name" class="form-control"/>
                       <label class="text-light">Year:</label>
                       <select class="form-control " name="year_id">
                           @foreach($years as $year)
                               <option value="{{$year->id}}">{{$year->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="save" class="btn btn-green"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
