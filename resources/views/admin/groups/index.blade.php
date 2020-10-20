@extends('layouts.master')
@section('main-section')
    <groups-component v-bind:years="{{$years}}"></groups-component>
    <a href="{{route('admin.groups.create')}}" class="mb-2 mr-2 btn btn-success">Add New </a>

@endsection
