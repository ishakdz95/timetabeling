@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-10">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Group timetabeling</h5>

                <table class="table">
                   {{--<tr>
                        <th>days</th>
                        <th >08:00-09:30</th>
                        <th >09:30-11:00</th>
                        <th >11:00-12:30</th>
                        <th >12:30-14:00</th>
                        <th >14:00-15:30</th>
                        <th >15:30-17:00</th>

                    </tr>--}}
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
                    @forelse($arr as $item)
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
