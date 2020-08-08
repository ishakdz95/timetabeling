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
                       <br/>
                       <label class="text-light">Type Of Room:</label>
                       <select class="form-control" name="type">
                           <option value="lecture hall">lecture hall</option>
                           <option value="TD room">TD room</option>
                           <option value="laboratory">laboratory</option>
                       </select>
                       <div type="hidden">
                       <input type="hidden" id="available" name="available" value="1" >
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
