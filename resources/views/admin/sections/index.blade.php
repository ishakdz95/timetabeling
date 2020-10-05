@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
        <addbutton-component
            :url="{{ json_encode(url('')) }}"
            :route="'/admin/sections/create'"
        ></addbutton-component>
        <sections-component :years="{{$years}}"> </sections-component>
    </div>
@endsection

