@extends('layout.app')

@section('content')
    
<div class="header"> 
    <h1 class="page-header">
        All Employees
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Employee</a></li>
        <li class="active">View</li>
    </ol>               
</div>
<!-- /. PAGE INNER  -->
<div id="page-inner">

    <div class="row">  
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Employee List
                </div> 
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Salary</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($employees) > 1)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->firstname }}</td>
                                            <td>{{ $employee->lastname }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td><button class="btn btn-primary">Action</button></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No employees found
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection