@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8 ">
        <div class="main-card mb-3 card ">
            <div class="card-body table-dark">
                <h5 class="card-title text-site">Days</h5>
                <table class="mb-0 table ">
                        <tr>
                            <th >#</th>
                            <th >Nam of Day</th>
                            <th >Timeslots of day</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @forelse($days as $day)
                            <tr>
                                <td >{{$day->id}}</td>
                                <td >{{$day->name}}</td>
                                <td>
                                    @foreach($day->timeslots as $timeslot)
                                        {{$timeslot->name}}
                                    @endforeach

                                </td>
                                <td><a href="{{route('admin.days.edit',$day->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.days.destroy',$day->id)}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                    </form>
                            </tr>
                        @empty
                            <tr>
                                <td  colspan="2" class="text-light"> No Days Found.</td>
                            </tr>
                        @endforelse

                    </table>
                </div>
        </div>

        <a href="{{route('admin.days.create')}} " class="mb-2 mr-2 btn btn-success ">Add New</a>
            </div>
@endsection
