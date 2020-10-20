@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title text-site">New Professor</h5>
                   <form method="POST" action="{{route('admin.professors.store')}}">
                       @csrf
                       <label class="text-light">First Name:</label>
                       <input type="text" name="first_name" class="form-control" required/>
                       <label class="text-light">Last Name:</label>
                       <input type="text" name="last_name" class="form-control" required/>
                       <label class="text-light">Grade:</label>
                       <select class="form-control" name="grade" >
                           <option value="A1">A1</option>
                           <option value="A2">A2</option>
                           <option value="A3">A3</option>
                       </select>
                       <label class="text-light">Type:</label>
                       <select class="form-control" name="type" required>
                           <option value="A">A</option>
                           <option value="B">B</option>
                       </select>
                       <br>
                       <label class="text-light">Sex:</label>
                       <input type="radio" id="male" name="sex" value="male">
                       <label  for="male" class="text-light">Male</label>
                       <input type="radio" id="female" name="sex" value="female">
                       <label  for="female" class="text-light">Female</label>
                       <div type="hidden">
                           <input type="hidden" id="available" name="available" value="1" >
                       </div>
                       <br/><br/>
                       <input type="submit" value="save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.professors.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>
@endsection
