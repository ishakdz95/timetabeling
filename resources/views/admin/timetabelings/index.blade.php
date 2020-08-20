@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Time Tabeling</div>

                <div class="card-body">
                    <br><br><br>

                    <table border=1 width=1500>
                            @forelse($tables as $table)
                            <tr class="text-light">
                            @foreach($table as $value)
                                    <td>
                                        {{$value->day_name}}
                                        {{$value->timeslot_name}}<br>
                                        {{$value->professor_name}}<br>
                                        {{$value->cours_name}}<br>
                                        {{$value->type}}<br>
                                        {{$value->section_name}}<br>
                                     {{$value->group_name}}</td>
                                @endforeach
                            </tr>
                            @empty

                            @endforelse

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
