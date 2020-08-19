@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Groups</div>

                <div class="card-body">
                    <a href="{{route('admin.groups.create')}}" class="btn btn-green">Add New Group</a>
                    <br><br><br>
                    <table class="table">
                        <tr>
                            <th class="text-light">Course</th>
                            <th class="text-light">Section</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($groups as $group)
                            <tr>
                                <td class="text-light">{{$group->name}}</td>
                                <td class="text-light">
                                    {{$group->section->name}}
                                </td>
                                <td class="text-light">
                                    @foreach($group->timeslots as $timeslot)
                                        {{$timeslot->name}}
                                        {{$timeslot->day->name}}

                                    @endforeach
                                </td>
                                <td><a href="{{route('admin.groups.edit',$group->id)}}" class="btn btn-info">Edit</a><td>
                                <form method="POST" action="{{route('admin.groups.destroy',$group->id)}}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                </form>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-light" colspan="2"> No Groups Found.</td>
                            </tr>
                        @endforelse
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
