@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
    <timeslots-component v-bind:days="{{$days}}"></timeslots-component >
    <a href="{{route('admin.timeslots.create')}}" class="mb-2 mr-2 btn btn-success">Add New</a>
    </div>
  @endsection
