@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Time Tabeling</div>

                <div class="card-body">
                    <br><br><br>

                    <table class="table">
                        @foreach($days as $day)
                            <tr>
                                <td class="text-light">{{$day->name}}</td>
                                <td class="text-light">
                                    @foreach($day->timeslots as $timeslot)
                                        {{$timeslot->name}} ----
                                    @endforeach
                                </td>
                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
