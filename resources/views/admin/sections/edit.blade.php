@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Edit Section</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.sections.update',$section->id)}}">
                       {{method_field('PUT')}}
                       @csrf
                       <label class="text-light">Name Of Section:</label>
                       <input type="text" name="name" value="{{$section->name}}" class="form-control"/>
                       <br/><br/>
                       <input type="submit" value="Save" class="btn btn-green"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
