@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Time Tabeling</div>

                <div class="card-body">
                    <br><br><br>
                    <a href="{{route('new_population')}}" class="btn btn-green">Make new generation</a>
                    <a href="{{route('best_timetabeling')}}" class="btn btn-green">Best time tabeling</a>
                </div>
            </div>
        </div>
    </div>

@endsection
