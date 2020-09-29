@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Professors</h5>

                    <table class="table">
                        <tr>
                            <th>First name</th>
                            <th >Last name</th>
                            <th >Grade</th>
                            <th >Type</th>
                            <th >Sex</th>
                            <th >TimeTabeling</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @forelse($professors as $professor)
                            <tr>
                                <td >{{$professor->first_name}}</td>
                                <td >{{$professor->last_name}}</td>
                                <td >{{$professor->grade}}</td>
                                <td >{{$professor->ype}}</td>
                                <td >{{$professor->sex}}</td>
                                <td >
                                    <a href="#" class="mb-2 mr-2 btn btn-secondary">Timetabeling</a>
                                </td>

                                <td><a href="{{route('admin.professors.edit',$professor->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.professors.destroy',$professor->id)}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this professor?')" class="btn btn-danger"/>
                                    </form>
                            </tr>

                        @empty
                            <tr>
                                <td  colspan="2"> No Professors Found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    <a href="{{route('admin.professors.create')}} " class="mb-2 mr-2 btn btn-success">Add New</a>
    <br><br><br>
@endsection
