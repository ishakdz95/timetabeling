@extends('layouts.master')

@section('main-section')
    <div class="card-body"><h5 class="card-title">New Timeslot</h5>
                   <form method="POST" action="{{route('admin.timeslots.store')}}">
                       @csrf
                       <label >Time Slot:</label>
                       <select class="form-control" name="name">
                           <option value="08:00-09:30">08:00-09:30</option>
                           <option value="09:30-11:00">09:30-11:00</option>
                           <option value="11:00-12:30">11:00-12:30</option>
                           <option value="12:30-14:00">12:30-14:00</option>
                           <option value="14:00-15:30">14:00-15:30</option>
                           <option value="15:30-17:00">15:30-17:00</option>
                       </select>
                       <div type="hidden">
                           <input type="hidden" id="available" name="available" value="1" >
                       </div>
                       <label >Day:</label>
                        <select class="form-control " name="day_id">
                            @foreach($days as $day)
                                <option value="{{$day->id}}">{{$day->name}}</option>
                            @endforeach

                        </select>
                       <br/>
                       <input type="submit" value="save" class="mt-1 btn btn-primary"/>
                   </form>
                </div>

@endsection
