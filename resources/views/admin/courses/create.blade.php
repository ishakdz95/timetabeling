@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body"><h5 class="card-title text-site">New Course</h5>
        <form method="POST" action="{{route('admin.courses.store')}}">
            @csrf
            <div class="position-relative form-group">
                <label for="validationCustom01" class="text-light">Course Name</label>
                <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="course name" required>
            </div>
            <div class="position-relative form-group">
                <label for="exampleSelect"  class="text-light" required>Type of Course:</label>
                <select name="type" id="exampleSelect" class="form-control" required>
                    <option value="Cours">Course</option>
                    <option value="TD">TD</option>
                    <option value="TP">TP</option>
                </select>
            </div>
            <div class="position-relative form-group">
                <label for="exampleSelect"  class="text-light" >Priority:</label>
                <select name="priority" id="exampleSelect" class="form-control" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>
            <div class="position-relative form-group">
                <label for="exampleSelect"  class="text-light">Concerned year: </label>
                <select id="exampleSelect" class="form-control" name="year_id" required>
                        @foreach($years as $year)
                            <option value="{{$year->id}}">{{$year->name}}</option>
                        @endforeach
                </select>
            </div>
            <input type="submit" value="save" class="mt-1 btn btn-primary">
            <a href="{{route('admin.courses.index')}} " class="mt-1 btn btn-warning">Cancel</a>
        </form>
    </div>
@endsection
