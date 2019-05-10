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
    @if(count($types) > 0)
        <form method="POST">
                @csrf
                @method('DELETE')

        <div class="panel panel-primary">
            <div class="panel-heading">
                Leave Types
            </div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow-y: hidden">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Allowance Per Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->description }}</td>
                                        <td>{{ $type->allowance }} Days</td>
                                        <td>
                                            <a class="btn btn-warning" href="/leave-types/{{ $type->id }}/edit">Edit</a> 
                                            <button class="btn btn-danger" formaction="{{ action('LeaveTypesController@destroy', $type->id) }}" type="submit">Delete</button> 
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $types->Links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="panel panel-primary" style="padding:20px;background-color:white">
            <p class="alert alert-warning" style="margin:0px;">No Leave Types Found</p><br/>
            <a href="/add-leave-type" class="btn btn-success" >Add New Leave Type</a>
        </div>
    @endif
</div>

    

@endsection