@extends('layouts.master')

@section('main-section')
    <div class="card-body"><h5 class="card-title">Edit Timeslot</h5>
                   <form method="POST" action="{{route('admin.timeslots.update',$timeslot->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label >TimeSlot:</label>
                       <input type="text" name="name" value="{{$timeslot->name}}" class="form-control"/>
                       <label >Day:</label>
                       <select class="form-control " name="day_id">
                           @foreach($days as $day)
                               <option value="{{$day->id}}">{{$day->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                   </form>
                </div>

@endsection
