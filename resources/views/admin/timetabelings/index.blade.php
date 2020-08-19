@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-light card-header">Time Tabeling</div>

                <div class="card-body">
                    <br><br><br>

                    <table class="table">


                        <tr class="text-light">
                            @forelse($table as $t)
                                <div class="text-light">{{$timeslots->find($t->timeslot_id)->name}}</div>
                                <div class="text-light">{{$timeslots->find($t->timeslot_id)->courses->find($t->cours_id)->name}}</div>
                                <div class="text-light">{{$timeslots->find($t->timeslot_id)->professors->find($t->professor_id)->first_name}}</div>
                                <div class="text-light">{{$timeslots->find($t->timeslot_id)->groups->find($t->group_id)->name}}</div>
                            @empty

                            @endforelse
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
