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
                       <br/><br/>
                       <input type="submit" value="Save" class="btn btn-green"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
