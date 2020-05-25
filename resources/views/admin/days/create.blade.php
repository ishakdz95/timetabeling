@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Add New Day</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.days.store')}}">
                       @csrf
                       <label class="text-light">Name Of Day:</label>
                       <select class="form-control" name="name">
                           <option value="Saturday">Saturday</option>
                           <option value="Sunday">Sunday</option>
                           <option value="Monday">Monday</option>
                           <option value="Tuesday">Tuesday</option>
                           <option value="Wednesday">Wednesday</option>
                           <option value="Thursday">Thursday</option>
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
