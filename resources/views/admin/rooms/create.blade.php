@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body"><h5 class="card-title">New Room</h5>
        <form method="POST" action="{{route('admin.rooms.store')}}">
            @csrf
            <div class="position-relative form-group">
                <label for="validationCustom01">Room Name</label>
                <input type="text" name="code" class="form-control" id="validationCustom01" placeholder="course name" required>
            </div>
            <div class="position-relative form-group">
                <label for="exampleSelect" class="" required>Type Of Room:</label>
                <select name="type" id="exampleSelect" class="form-control" required>
                    <option value="Cours">lecture hall</option>
                    <option value="TD">TD room</option>
                    <option value="TP">laboratory</option>
                </select>
            </div>
            <div type="hidden">
                <input type="hidden" id="available" name="available" value="1" >
            </div>
            <input type="submit" value="save" class="mt-1 btn btn-primary">
            <a href="{{route('admin.rooms.index')}} " class="mt-1 btn btn-warning">Cancel</a>
        </form>
    </div>
@endsection
