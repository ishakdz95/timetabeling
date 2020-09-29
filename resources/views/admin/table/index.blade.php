@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Time Tabeling</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th class="text-light"></th>
                            <th class="text-light"></th>
                            <th class="text-light"></th>
                            <th class="text-light"></th>
                            <th class="text-light"></th>
                            <th class="text-light"></th>
                            @forelse($array as $item)
                                {{$i=0}}
                                @foreach($item as $value)

                                @endforeach
                            @empty
                            @endforelse
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
