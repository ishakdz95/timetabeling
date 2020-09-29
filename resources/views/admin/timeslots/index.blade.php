@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Timeslots</h5>
                    <br>
                    <table class="table">
                        <tr>
                            <th >Time Slot</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($timeslots as $timeslot)
                            <tr>
                                <td >{{$timeslot->name}}</td>
                                <td >{{$timeslot->day->name}}</td>

                                <td><a href="{{route('admin.timeslots.edit',$timeslot->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.timeslots.destroy',$timeslot->id)}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                    </form>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-light" colspan="2"> No Time Slot Found.</td>
                            </tr>
                        @endforelse
                        </table>
                <a href="{{route('admin.timeslots.create')}}" class="mb-2 mr-2 btn btn-success">Add New</a>
                </div>
            </div>
        </div>

@endsection
