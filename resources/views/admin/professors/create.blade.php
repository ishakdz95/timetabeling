@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Add New Professor</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.professors.store')}}">
                       @csrf
                       <label class="text-light">First Name:</label>
                       <input type="text" name="first_name" class="form-control"/>
                       <label class="text-light">Last Name:</label>
                       <input type="text" name="last_name" class="form-control"/>
                       <label class="text-light">Grade:</label>
                       <select class="form-control" name="grade" >
                           <option value="A1">A1</option>
                           <option value="A2">A2</option>
                           <option value="A3">A3</option>
                       </select>
                       <label class="text-light">Sex:</label>
                       <input type="radio" id="male" name="sex" value="male">
                       <label class="text-light" for="male">Male</label>
                       <input type="radio" id="female" name="sex" value="female">
                       <label class="text-light" for="female">Female</label>
                       <br/><br/>
                       <input type="submit" value="save" class="btn btn-green"/>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
