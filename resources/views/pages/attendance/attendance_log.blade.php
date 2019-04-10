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
<form method="POST">
        @csrf
        @method('DELETE')

<div id="page-inner">
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
                            <th>Campus</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($attendances) >= 1)
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $attendance->id }}"></td>
                                    <td>{{ $attendance->employeeId }}</td>
                                    <td>{{ $attendance->fullname }}</td>
                                    <td>{{ date('Y-m-d' ,$attendance->visited) }}</td>
                                    <td>{{ $attendance->campus }}</td>
                                    
                                    <td><button class="btn btn-danger" formaction="{{ action('AttendanceController@destroy', $attendance->id) }}" type="submit" style="margin-bottom: 10px">Delete</button></td>
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
                    {{ $attendances->Links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</form>

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