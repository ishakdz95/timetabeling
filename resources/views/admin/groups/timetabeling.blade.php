@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-10">
        <div class="main-card mb-3 card">
            <div class="card-body table-dark">
                <h5 class="card-title text-site">{{\App\Group::find(Request::segment(3))->section->year->name}},{{\App\Group::find(Request::segment(3))->section->name}},{{\App\Group::find(Request::segment(3))->name}}: Timetable</h5>
                <table class="table_site">
                    <tr>
                        <td>Day/Time</td>
                        <td >08:00-09:30</td>
                        <td >09:30-11:00</td>
                        <td >11:00-12:30</td>
                        <td >12:30-14:00</td>
                        <td >14:00-15:30</td>
                        <td >15:30-17:00</td>

                    </tr>
                </table>
                <table border="2" class="table_site">
                    @foreach($array as $item)
                        <tr>
                            <th>{{$item[1]->day_name}}</th>
                        @foreach($item as $value)
                           <td>
                               {{$value->cours_name}}<br>
                               {{$value->section_name}}<br>
                               {{$value->room_name}}<br>
                               {{$value->professor_first_name}}
                               {{$value->professor_last_name}}
                           </td>
                        @endforeach
                        </tr>
                    @endforeach

</table>

</div>
</div>
</div>
@endsection
