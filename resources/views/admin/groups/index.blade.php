@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Groups</h5>
                    <table class="table">
                        <tr>
                            <th >Group</th>
                            <th >Section</th>
                            <th >TimeTabeling</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($groups as $group)
                            <tr>
                                <td >{{$group->name}}</td>
                                <td >
                                    {{$group->section->name}}
                                </td>
                                <td><a href="{{route('group_timetabeling',$group->id)}}" class="mb-2 mr-2 btn btn-secondary">Timetabeling</a><td>
                                <td><a href="{{route('admin.groups.edit',$group->id)}}" class="btn btn-info">Edit</a><td>
                                <form method="POST" action="{{route('admin.groups.destroy',$group->id)}}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                </form>
                            </tr>
                        @empty
                            <tr>
                                <td  colspan="2"> No Groups Found.</td>
                            </tr>
                        @endforelse
                        </table>
                </div>
            </div>
        </div>
    <a href="{{route('admin.groups.create')}}" class="mb-2 mr-2 btn btn-success">Add New </a>
@endsection
