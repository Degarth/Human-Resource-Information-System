@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Attendance Log
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Attendance</a></li>
        <li class="active">Log</li>
    </ol>               
</div>

<div id="page-inner">
    @if(count($attendances) > 0)
    <form method="POST">
        @csrf
        @method('DELETE')

    
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <div style="margin-top:5px">Employees Attendance Log</div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-right:25px"><button formaction="/delete-attendance" type="submit"  class="btn btn-danger pull-right">Delete All Selected</button></div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow-y: hidden;">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="selectall"></th>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Campus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach($attendances as $attendance)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $attendance->id }}"></td>
                                        <td>{{ $attendance->employee_id }}</td>
                                        <td>{{ $attendance->employee->firstname }} {{ $attendance->employee->lastname }}</td>
                                        <td>{{ $attendance->visited }}</td>
                                        <td>{{ $attendance->from }}</td>
                                        <td>{{ $attendance->to }}</td>
                                        <td>{{ $attendance->campus->name }}</td>
                                        
                                        <td><button class="btn btn-danger" formaction="{{ action('AttendanceController@destroy', $attendance->id) }}" type="submit" style="margin-bottom: 10px">Delete</button></td>
                                    </tr>
                                @endforeach   
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ $attendances->Links() }}
        </div>
    </form> 
    @else
    <div class="panel panel-primary" style="padding:20px;background-color:white">
        <p class="alert alert-warning" style="margin:0px;">Attendance Log Is Empty</p><br/>
        <a href="/add-attendance" class="btn btn-success" >Add One Attendance</a>
        <a href="/upload-attendance" class="btn btn-success" >Upload Attendance</a>
    </div>
    @endif
</div>

<script type="text/javascript">
    $('.selectall').click( function () {
        $('.selectbox').prop('checked', $(this).prop('checked'));
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
        } else {
            $('.selectall').prop('checked', false);
        }
    })
</script>

@endsection