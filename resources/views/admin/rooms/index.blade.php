@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Rooms</div>

                <div class="card-body">
                    <a href="{{route('admin.rooms.create')}} " class="btn btn-green">Add new room</a>
                    <br><br><br>
                    <table class="table">
                        <tr>
                            <th class="text-light">Code Of Room</th>
                            <th class="text-light">Available</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @forelse($rooms as $room)
                            <tr>
                                <td class="text-light">{{$room->code}}</td>
                                <td class="text-light">{{$room->available}}</td>

                                <td><a href="{{route('admin.rooms.edit',$room->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.rooms.destroy',$room->id)}}">
                                    @csrf
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="delete" onclick=" return confirm ('are you sure?')" class="btn btn-danger ">
                                    </form>


                            </tr>
                        @empty
                            <tr>
                                <td class="text-light" colspan="2"> no rooms found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
