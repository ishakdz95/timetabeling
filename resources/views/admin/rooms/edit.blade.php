@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Edit Room</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.rooms.update',$room->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">Code Of Room:</label>
                       <input type="text" name="code" value="{{$room->code}}" class="form-control"/>
                       <br/>
                       <label class="text-light">Type Of Room:</label>
                       <label class="text-light">{{$room->type}}</label>
                       <br/>
                       <label class="text-light">change type of room</label>
                       <select class="form-control" name="type">
                           <option value="lecture hall">lecture hall</option>
                           <option value="TD room">TD room</option>
                           <option value="laboratory">laboratory</option>
                       </select>
                       <input type="submit" value="Save" class="btn btn-green"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
