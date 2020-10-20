@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title text-site">New Day</h5>
                   <form method="POST" action="{{route('admin.days.store')}}">
                       @csrf
                       <label class="text-light" >Name Of Day:</label>
                       <select class="form-control" name="name">
                           <option value="Saturday">Saturday</option>
                           <option value="Sunday">Sunday</option>
                           <option value="Monday">Monday</option>
                           <option value="Tuesday">Tuesday</option>
                           <option value="Wednesday">Wednesday</option>
                           <option value="Thursday">Thursday</option>
                       </select>
                       <br/><br/>
                       <input type="submit" value="save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.days.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>

    </div>
@endsection
