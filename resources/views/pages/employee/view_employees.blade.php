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

<form method="POST">
        @csrf
        @method('DELETE')
    
    <div class="row">  
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading" >
                    <div>
                        <button formaction="/delete-all" type="submit"  class="btn btn-danger">Delete All Selected</button>
                        <a href="/view-employees/create" class="btn btn-success" style="float:right">Add New Employee</a>
                    </div>
                </div> 
                <div class="panel-body" style="margin-top:0px;padding-top:0px"> 
                    <div class="table-responsive" style="overflow-y: hidden;"> 
                        <table class="table table-striped table-bordered table-hover"> <!--id="dataTables-example"-->
                            <thead> 
                                <tr>
                                    <th><input type="checkbox" class="selectall"></th>
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
                                @if(count($employees) >= 1)
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $employee->id }}"></td>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->firstname }}</td>
                                            <td>{{ $employee->lastname }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td><div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item btn btn-primary" href="/view-employees/{{ $employee->id }}">View</a>
                                                            <a class="dropdown-item btn btn-warning" href="/view-employees/{{ $employee->id }}/edit">Edit</a>
                                                          
                                                            <button class="dropdown-item btn btn-danger" formaction="{{ action('EmployeesController@destroy', $employee->id) }}" type="submit" class="dropdown-item">Delete</button> 
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                @else
                                    <p>No employees found</p>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><input type="checkbox" class="selectall2"></th>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Salary</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table> 
                    </div>
                </div>
            </div>
            <div class="text-center" >
                {{ $employees->Links() }}<br/>
            </div>
        </div>
    </div>
</form>

</div>
<!--
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
-->

<script type="text/javascript">
    $('.selectall').click( function () {
        $('.selectbox').prop('checked', $(this).prop('checked'));
        $('.selectall2').prop('checked', $(this).prop('checked'));
    })
    $('.selectall2').click( function () {
        $('.selectbox').prop('checked', $(this).prop('checked'));
        $('.selectall').prop('checked', $(this).prop('checked'));
    })
    $('.selectbox').change( function () {
        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').length;
        if(total == number) {
            $('.selectall').prop('checked', true);
            $('.selectall2').prop('checked', true);
        } else {
            $('.selectall').prop('checked', false);
            $('.selectall2').prop('checked', false);
        }
    })
</script>

@endsection