@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Edit Professor</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.professors.update',$professor->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">First Name:</label>
                       <input type="text" name="first_name" value="{{$professor->first_name}}" class="form-control"/>
                       <label class="text-light">Last Name:</label>
                       <input type="text" name="last_name" value="{{$professor->last_name}}" class="form-control"/>
                       <label class="text-light">Grade:</label>
                       <input type="text" name="grade" value="{{$professor->grade}}" class="form-control"/>
                       <label class="text-light">Type:</label>
                       <input type="text" name="type" value="{{$professor->type}}" class="form-control"/>
                       <label class="text-light">Sex:</label>
                       <input type="text" name="sex" value="{{$professor->sex}}" class="form-control"/>
                       <br/><br/>
                       <input type="submit" value="Save" class="btn btn-green"/>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
