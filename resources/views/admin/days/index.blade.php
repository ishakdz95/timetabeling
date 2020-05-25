@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Days</div>

                <div class="card-body">
                    <a href="{{route('admin.days.create')}} " class="btn btn-green">Add New Day</a>
                    <br><br><br>
                    <table class="table">
                        <tr>
                            <th class="text-light">Nam of Day</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @forelse($days as $day)
                            <tr>
                                <td class="text-light">
                                    @foreach($day->timeslots as $timeslot)
                                        {{$timeslot->name}}
                                    @endforeach

                                </td>
                                <td class="text-light">{{$day->name}}</td>
                                <td><a href="{{route('admin.days.edit',$day->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.days.destroy',$day->id)}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                    </form>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-light" colspan="2"> No Days Found.</td>
                            </tr>
                        @endforelse




                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
