@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Groups</div>
                <table class="table">
                    <tr>
                        <th class="text-light">08:00-09:30</th>
                        <th class="text-light">09:30-11:00</th>
                        <th class="text-light">11:00-12:30</th>
                        <th class="text-light">12:30-14:00</th>
                        <th class="text-light">14:00-15:30</th>
                        <th class="text-light">15:30-17:00</th>

                    </tr>
                    @forelse($arr as $item)
                        <tr class="text-light">
                            <td class="text-light">{{$item->day_name}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-light" colspan="2"> No Groups Found.</td>
                        </tr>
                    @endforelse
                </table>

                </div>
            </div>
        </div>
    </div>

@endsection
