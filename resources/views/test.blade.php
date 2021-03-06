
@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-light card-header">Add New Course</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('admin.courses.store')}}">
                            @csrf
                            <label class="text-light">Name Of Course:</label>
                            <input type="form-control text" name="name" class="form-control"/>
                            <label class="text-light">Type Of Course:</label>
                            <select class="form-control" name="type">
                                <option value="Cours">Course</option>
                                <option value="TD">TD</option>
                                <option value="TP">TP</option>
                            </select>
                            <label class="text-light">Priorty:</label>
                            <select class="form-control" name="priority" >
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>

                            <label class="text-light">Year:</label>
                            <select class="form-control " name="year_id">
{{--                                @foreach($years as $year)--}}
{{--                                    <option value="{{$year->id}}">{{$year->name}}</option>--}}
{{--                                @endforeach--}}

                            </select>
                            <br/><br/>
                            <input type="submit" value="save" class="btn btn-green"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
