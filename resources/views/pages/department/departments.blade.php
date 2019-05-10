@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Departments
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Department</a></li>
        <li class="active">View</li>
    </ol>               
</div>

<div id="page-inner">
    @if(count($departments) > 0)
        <form method="POST">
                @csrf
                @method('DELETE')

        <div class="panel panel-primary">
            <div class="panel-heading">
                Department List
            </div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow-y: hidden">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Department Name</th>
                                <th>Details</th>
                                <th>Department Head</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->details }}</td>
                                        <td>{{ $department->head }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="/departments/{{ $department->id }}/edit">Edit</a> 
                                            <button class="btn btn-danger" formaction="{{ action('DepartmentsController@destroy', $department->id) }}" type="submit">Delete</button> 
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $departments->Links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="panel panel-primary" style="padding:20px;background-color:white">
            <p class="alert alert-warning" style="margin:0px;">No Department Found</p><br/>
            <a href="/add-department" class="btn btn-success" >Add Department</a>
        </div>
    @endif
</div>


@endsection