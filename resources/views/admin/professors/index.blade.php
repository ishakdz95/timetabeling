@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Professors</div>

                <div class="card-body">
                    <a href="{{route('admin.professors.create')}} " class="btn btn-green">Add new professor</a>
                    <br><br><br>
                    <table class="table">
                        <tr>
                            <th class="text-light">First name</th>
                            <th class="text-light">Last name</th>
                            <th class="text-light">Grade</th>
                            <th class="text-light">Sex</th>
                            <th class="text-light">Time Slots</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @forelse($professors as $professor)
                            <tr>
                                <td class="text-light">{{$professor->first_name}}</td>
                                <td class="text-light">{{$professor->last_name}}</td>
                                <td class="text-light">{{$professor->grade}}</td>
                                <td class="text-light">{{$professor->sex}}</td>
                                <td class="text-light">
                                    @foreach($professor->timeslots as $timeslot)
                                        {{$timeslot->day->name}}
                                        {{$timeslot->name}}
                                   @endforeach
                                   </td>

                                <td><a href="{{route('admin.professors.edit',$professor->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.professors.destroy',$professor->id)}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                    </form>
                            </tr>

                        @empty
                            <tr>
                                <td class="text-light" colspan="2"> No Professors Found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
