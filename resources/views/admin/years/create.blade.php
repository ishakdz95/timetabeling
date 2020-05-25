@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Add New Year</div>

                <div class="card-body">
                   <form method="POST" action="{{route('admin.years.store')}}">
                       @csrf
                       <label class="text-light">Year:</label>
                       <input type="text" name="name" class="form-control"/>

                       <br/><br/>
                       <input type="submit" value="save" class="btn btn-green"/>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
