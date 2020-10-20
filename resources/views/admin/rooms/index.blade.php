@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
        <div class="main-card mb-3 card">
            <div class="card-body table-dark">
                <h5 class="card-title text-site">Rooms</h5>

                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th >Code Of Room</th>
                        <th >Available</th>
                        <th >Type</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($rooms as $room)
                        <tr>
                            <td >{{$room->id}}</td>
                            <td >{{$room->code}}</td>
                            <td >{{$room->available}}</td>
                            <td >{{$room->type}}</td>
                            <td><a href="{{route('admin.rooms.edit',$room->id)}}" class="btn btn-info">Edit</a><td>
                                <form method="POST" action="{{route('admin.rooms.destroy',$room->id)}}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" value="delete" onclick=" return confirm ('are you sure?')" class="btn btn-danger ">
                                </form>


                        </tr>
                    @empty
                        <tr>
                            <td  colspan="2"> no rooms found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{route('admin.rooms.create')}}" class="mb-2 mr-2 btn btn-success">Add New</a>
    </div>
@endsection
