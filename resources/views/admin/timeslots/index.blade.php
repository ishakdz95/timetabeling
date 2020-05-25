@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Time Slot</div>

                <div class="card-body">
                    <a href="{{route('admin.timeslots.create')}}" class="btn btn-green">Add new Time Slot</a>
                    <br><br><br>
                    <table class="table">
                        <tr>
                            <th class="text-light">Time Slot</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($timeslots as $timeslot)
                            <tr>
                                <td class="text-light">{{$timeslot->name}}</td>

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
