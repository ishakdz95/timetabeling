@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    <div class="col-lg-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Years</h5>
                <br>
                    <table class="table">
                        <tr>
                            <th >Years</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($years as $year)
                            <tr>
                                <td >{{$year->name}}</td>
                                <td><a href="{{route('admin.years.edit',$year->id)}}" class="btn btn-info">Edit</a><td>
                                    <form method="POST" action="{{route('admin.years.destroy',$year->id)}}">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="delete" onclick=" return confirm ('are you sure?')" class="btn btn-danger ">
                                    </form>

                            </tr>
                        @empty
                            <tr>
                                <td class="text-light" colspan="2"> No Year Found.</td>
                            </tr>
                        @endforelse
                        </table>
                </div>
            </div>
        </div>
    <a href="{{route('admin.years.create')}}" class="mb-2 mr-2 btn btn-success">Add New</a>
@endsection
