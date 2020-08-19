@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Sections</div>

                <div class="card-body">
                    <a href="{{route('admin.sections.create')}}" class="btn btn-green">Add New Section</a>
                    <br><br><br>
                    <table class="table">
                        <tr>
                            <th class="text-light">Section name</th>
                            <th class="text-light">Year</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($sections as $section)
                            <tr>
                                <td class="text-light">{{$section->name}}</td>
                                <td class="text-light">
                                    {{$section->year->name}}
                                </td>
                                <td class="text-light">
                                    @foreach($section->timeslots as $timeslot)
                                        {{$timeslot->name}}
                                        {{$timeslot->day->name}}
                                    @endforeach
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
                                <td class="text-light" colspan="2"> no sections found.</td>

                            </tr>
                        @endforelse
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
