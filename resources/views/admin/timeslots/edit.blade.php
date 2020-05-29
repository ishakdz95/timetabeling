@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Edit TimeSlot</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.timeslots.update',$timeslot->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">TimeSlot:</label>
                       <input type="text" name="name" value="{{$timeslot->name}}" class="form-control"/>
                       <label class="text-light">Day:</label>
                       <select class="form-control " name="day_id">
                           @foreach($days as $day)
                               <option value="{{$day->id}}">{{$day->name}}</option>
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
