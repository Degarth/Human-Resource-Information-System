@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Campuses
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Campus</a></li>
        <li class="active">View</li>
    </ol>               
</div>

<div id="page-inner">
    @if(count($campuses) >= 1)
        <form method="POST">
                @csrf
                @method('DELETE')

        <div class="panel panel-primary">
            <div class="panel-heading">
                Campus List
            </div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow-y: hidden">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Campus Name</th>
                                <th>Campus Head</th>
                                <th>Description</th>
                                @if(Auth::user()->email == 'admin@gmail.com')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            
                                @foreach($campuses as $campus)
                                    <tr>
                                        <td>{{ $campus->name }}</td>
                                        <td>{{ $campus->head }}</td>
                                        <td>{{ $campus->description }}</td>
                                        @if(Auth::user()->email == 'admin@gmail.com')
                                            <td>
                                                <a class="btn btn-warning" href="/view-campus/{{ $campus->id }}/edit">Edit</a> 
                                                <button class="btn btn-danger" formaction="{{ action('CampusController@destroy', $campus->id) }}" type="submit">Delete</button> 
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $campuses->Links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="panel panel-primary" style="padding:20px;background-color:white">
            <p class="alert alert-warning" style="margin:0px;">No Campuses Found</p><br/>
            <a href="/new-campus" class="btn btn-success" >Add Campus</a>
        </div>
    @endif
</div>

@endsection