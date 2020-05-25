@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Add New Room</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.rooms.store')}}">
                       @csrf
                       <label class="text-light">Code Of Room:</label>
                       <input type="text" name="code" class="form-control"/>
                       <br/><br/>
                       <div type="hidden">
                       <label class="text-light">Available:</label>
                       <input type="hidden" id="available" name="available" value="1" >
                       <label class="text-light" for="available">available</label>
                       <input type="radio" id="available" name="available" value="0">
                       <label class="text-light" for="not_available">not available</label>
                       </div>
                       <br/><br/>
                       <input type="submit" value="save" class="btn btn-green"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
