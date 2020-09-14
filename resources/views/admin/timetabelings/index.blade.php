@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Time Tabeling</div>

                <div class="card-body">
                    <br><br><br>
                    <table>
                        <tr class="text-light card-header">
                            @forelse($arr as $item)
                            <td>
                                {{$item->day_name}}
                                {{$item->timeslot_name}}<br>
                                {{$item->room_name}}<br>
                                {{$item->set_name}}<br>
                                {{$item->professor_first_name}}<br>
                                {{$item->cours_name}}<br>
                                {{$item->type}}
                            </td>

                            @empty

                            @endforelse
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
