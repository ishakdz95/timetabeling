@extends('layouts.master')

@section('main-section')
    <div class="card-body"><h5 class="card-title text-site">New Year</h5>
                   <form method="POST" action="{{route('admin.years.store')}}">
                       @csrf
                       <label class="text-light">Year:</label>
                       <input type="text" name="name" class="form-control" required/>
                       <br/><br/>
                       <input type="submit" value="save" class="mt-1 btn btn-primary"/>
                       <a href="{{route('admin.years.index')}} " class="mt-1 btn btn-warning">Cancel</a>
                   </form>
                </div>
@endsection
