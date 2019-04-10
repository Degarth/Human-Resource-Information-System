@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Leave Types
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Leave</a></li>
        <li class="active">Types</li>
    </ol>               
</div>

<div id="page-inner">

    <form method="POST">
            @csrf
            @method('DELETE')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Leave Types
        </div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: hidden">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Allowance Per Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($types) >= 1)
                            @foreach($types as $type)
                                <tr>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->description }}</td>
                                    <td>{{ $type->allowance }}</td>
                                    <td><div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item btn btn-warning" href="/view-employees/{{ $type->id }}/edit">Edit</a> 
                                                    <button class="dropdown-item btn btn-danger" formaction="{{ action('LeaveTypesController@destroy', $type->id) }}" type="submit" class="dropdown-item">Delete</button> 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        @else
                            <p class="alert alert-warning" style="margin:0px;">Attendance Log Is Empty</p>
                        @endif
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
                <div class="text-center">
                    {{ $types->Links() }}
                </div>
            </div>
        </div>
    </div>
</div>

    

@endsection