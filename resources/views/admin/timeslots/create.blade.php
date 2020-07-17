@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Add New Time Slot</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.timeslots.store')}}">
                       @csrf
                       <label class="text-light">Time Slot:</label>
                       <select class="form-control" name="name">
                           <option value="08:00-09:30">08:00-09:30</option>
                           <option value="09:30-11:00">09:30-11:00</option>
                           <option value="11:00-12:30">11:00-12:30</option>
                           <option value="12:30-14:00">12:30-14:00</option>
                           <option value="14:00-15:30">14:00-15:30</option>
                           <option value="15:30-17:00">15:30-17:00</option>
                       </select>
                       <div type="hidden">
                           <label class="text-light">Available:</label>
                           <input type="hidden" id="available" name="available" value="1" >
                       </div>
                       <label class="text-light">Day:</label>
                        <select class="form-control " name="day_id">
                            @foreach($days as $day)
                                <option value="{{$day->id}}">{{$day->name}}</option>
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
