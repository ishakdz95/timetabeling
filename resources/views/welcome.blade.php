@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class= card-header">Time Tabling</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p >welcome</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
