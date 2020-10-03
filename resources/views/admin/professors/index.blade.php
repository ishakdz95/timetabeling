@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-10">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Professors</h5>

                    <table class="table">
                        <tr>
                            <th>First name</th>
                            <th >Last name</th>
                            <th >Grade</th>
                            <th >Courses</th>
                            <th >Sex</th>
                            <th >Edit</th>
                            <th >Delete</th>
                            <th>Attache course to professor</th>
                            <th>TimeTabeling</th>
                        </tr>

                        @forelse($professors as $professor)
                            <tr>
                                <td >{{$professor->first_name}}</td>
                                <td >{{$professor->last_name}}</td>
                                <td >{{$professor->grade}}</td>
                                <td >
                                    @foreach($professor->courses as $course)
                                        {{$course->name}}
                                    @endforeach
                                </td>
                                <td >{{$professor->sex}}</td>
                                <td><a href="{{route('admin.professors.edit',$professor->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.professors.destroy',$professor->id)}}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this professor?')" class="btn btn-danger"/>
                                    </form>
                                    <td><a onclick='myFunction(  window.open("{{URL::to('professor_courses/'.$professor->id)}}","Ratting","width=800,height=800,left=150,top=200,toolbar=0,status=0,"))' class="mt-1 btn btn-warning">Add courses</a></td>
                                    <td >
                                        <a href="#" class="mb-2 mr-2 btn btn-secondary">Timetabeling</a>
                                    </td>
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
    <br>
    <script>
        function myFunction() {

        }
    </script>
@endsection
