@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="card-body">
        <h5 class="card-title text-site">Edit Professor</h5>
                   <form method="POST" action="{{route('admin.professors.update',$professor->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">First Name:</label>
                       <input type="text" name="first_name" value="{{$professor->first_name}}" class="form-control" required/>
                       <label class="text-light">Last Name:</label>
                       <input type="text" name="last_name" value="{{$professor->last_name}}" class="form-control" required/>
                       <label class="text-light">Grade:</label>
                       <input type="text" name="grade" value="{{$professor->grade}}" class="form-control" required/>
                       <label class="text-light">Type:</label>
                       <select class="form-control" name="type" required>
                           <option value="A">A</option>
                           <option value="B">B</option>
                       </select>
                       <br/>
                       <label class="text-light">Sex:</label>
                       <input type="radio" id="male" name="sex" value="male">
                       <label  for="male" class="text-light">Male</label>
                       <input type="radio" id="female" name="sex" value="female">
                       <label  for="female" class="text-light">Female</label>
                       <br/><br/>
                       <input type="submit" value="Save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.professors.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>


@endsection
