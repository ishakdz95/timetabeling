@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" card-header bg-dark text-light">Dashboard</div>
                <div class="card-body bg-dark text-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p >Welcome to timetabeling generator</p>
                        <p >Welcome to timetabeling generator</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
