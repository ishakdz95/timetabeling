@extends('layouts.master')

@section('main-section')
    <div class="card-body"><h5 class="card-title text-site">Edit Timeslot</h5>
                   <form method="POST" action="{{route('admin.timeslots.update',$timeslot->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light" >TimeSlot:</label>
                       <select class="form-control" name="name">
                           <option value="{{$timeslot->id}}">{{$timeslot->name}}</option>
                           <option value="08:00-09:30">08:00-09:30</option>
                           <option value="09:30-11:00">09:30-11:00</option>
                           <option value="11:00-12:30">11:00-12:30</option>
                           <option value="12:30-14:00">12:30-14:00</option>
                           <option value="14:00-15:30">14:00-15:30</option>
                           <option value="15:30-17:00">15:30-17:00</option>
                       </select>
                       <label class="text-light" >Day:</label>
                       <select class="form-control " name="day_id">
                           @foreach($days as $day)
                               <option value="{{$day->id}}">{{$day->name}}</option>
                           @endforeach

                       </select>
                       <br/><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.timeslots.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>

@endsection
