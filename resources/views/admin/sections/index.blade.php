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
                            <th >Section name</th>
                            <th >Year</th>
                            <th >Timetabeling</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($sections as $section)
                            <tr>
                                <td >{{$section->name}}</td>
                                <td >
                                    {{$section->year->name}}
                                </td>
                                <td >
                                    <a href="#" class="mb-2 mr-2 btn btn-secondary">Timetabeling</a>
                                </td>
                                <td><a href="{{route('admin.sections.edit',$section->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.sections.destroy',$section->id)}}">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="delete" onclick=" return confirm ('are you sure?')" class="btn btn-danger ">
                                    </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"> no sections found.</td>

                            </tr>
                        @endforelse
                        </table>
                </div>
            </div>
        </div>
    <a href="{{route('admin.sections.create')}}" class="mb-2 mr-2 btn btn-success">Add New</a>

@endsection
