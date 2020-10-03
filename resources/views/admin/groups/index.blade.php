@extends('layouts.master')
{{-- the sidebare is rendred in the master.blade.php --}}
@section('main-section')
    {{-- <div>
         <addbutton-component
             :url="{{ json_encode(url('')) }}"
             :route="'/admin/groups/create'"
         ></addbutton-component>
         <groups-component :sections="{{$sections}}"></groups-component>
     </div>
 --}}
     <div class="col-lg-8">
         <div class="main-card mb-3 card">
             <div class="card-body">
                 <h5 class="card-title">Groups</h5>
                     <table class="table">
                         <tr>
                             <th >Group</th>
                             <th >Section</th>
                             <th >Year</th>
                             <th >TimeTabeling</th>
                             <th></th>
                             <th></th>
                         </tr>
                         @forelse($groups as $group)
                             <tr>
                                 <td >{{$group->name}}</td>
                                 <td >
                                     {{$group->section->name}}
                                 </td>
                                 <td >
                                     {{$group->section->year->name}}
                                 </td>
                                 {{--<td><a href="{{route('group_timetabeling',$group->id)}}" onclick="window.print()" class="mb-2 mr-2 btn btn-secondary">Timetabeling</a><td>--}}
                                 <td><a onclick='myFunction(  window.open("{{URL::to('group_timetabeling/'.$group->id)}}","Ratting","width=800,height=800,left=150,top=200,toolbar=0,status=0,"))' class="mt-1 btn btn-warning">Timetabeling</a></td>
                                 <td><a href="{{route('admin.groups.edit',$group->id)}}" class="btn btn-info">Edit</a><td>
                                 <form method="POST" action="{{route('admin.groups.destroy',$group->id)}}">
                                     @csrf
                                     {{ method_field('DELETE') }}
                                     <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger"/>
                                 </form>
                             </tr>
                         @empty
                             <tr>
                                 <td  colspan="2"> No Groups Found.</td>
                             </tr>
                         @endforelse
                         </table>
                 </div>
             </div>
         </div>
     <a href="{{route('admin.groups.create')}}" class="mb-2 mr-2 btn btn-success">Add New </a>
    <script>
        function myFunction() {

        }
    </script>
@endsection
