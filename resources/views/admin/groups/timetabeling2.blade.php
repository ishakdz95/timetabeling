@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-10">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Groups</h5>

                <table class="table">
                    {{-- <tr>
                         <td>Days/Timeslots</td>
                         <td >08:00-09:30</td>
                         <td >09:30-11:00</td>
                         <td >11:00-12:30</td>
                         <td >12:30-14:00</td>
                         <td >14:00-15:30</td>
                         <td >15:30-17:00</td>

                     </tr>
                     {{--@foreach($days as $day)
                         <tr>
                             <th>{{$day->name}}</th>
                             <td>
                                 @foreach($day->timeslots as $timeslot)
                                     @foreach($arr as $item)
                                         @if($item->day_id==$day->id  &&$item->timeslot_id==$timeslot->id)
                                         {{$item->section_name}}<br>
                                         {{$item->cours_name}}</br>
                                         {{$item->type}}<br>
                                         {{$item->professor_first_name}}<br>
                                         {{$item->professor_last_name}}<br>
                                         {{$item->room_name}}<br>
                                         @endif
                                     @endforeach
                                     @endforeach
                             </td>
                         </tr>

                     @endforeach--}}
    <tr >
        <td >day</td>
        <td >timeslot</td>
        <td >section</td>
        <td >course</td>
        <td >type</td>
        <td >professor_first_name</td>
        <td >professor_last_name</td>
        <td >room</td>
    </tr>
    @forelse($group_timetable as $item)
        <tr >
            <td >{{$item->day_name}}</td>
            <td >{{$item->timeslot_name}}</td>
            <td >{{$item->section_name}}</td>
            <td >{{$item->cours_name}}</td>
            <td >{{$item->type}}</td>
            <td >{{$item->professor_first_name}}</td>
            <td >{{$item->professor_last_name}}</td>
            <td >{{$item->room_name}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="2"> No Groups Found.</td>
        </tr>
    @endforelse
</table>

</div>
</div>
</div>
@endsection
