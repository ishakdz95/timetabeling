@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-body table-dark ">
                        <h4>Mila University Time Tabling generator</h4>
                    </div>

                    <div class="card-body table-dark ">
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
