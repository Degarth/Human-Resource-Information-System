@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Attendance Report
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Reports</a></li>
        <li class="active">Attendance</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white">
        @if(!empty($_GET))
        
        {!! Form::open(['action' => 'AttendanceReportController@search', 'method' => 'GET']) !!}
            <div class="row" style="padding: 5px">
                <div class="col-md-5 text-right">
                <div class="text-left">
                    {{ Form::label('fullname', 'Select Employee') }}
                </div>
                {{ Form::select('fullname', $employees, $fullname, 
                    [
                        'class' => 'form-control', 'placeholder' => '-Employee-'
                    ]) 
                }}
                </div>
                <div class="col-md-3 text-left">
                    <div class="text-left">
                        {{ Form::label('date_from', 'From') }}
                    </div>
                    {{ Form::date('date_from', $date_from, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-3 text-left">
                    <div class="text-left">
                        {{ Form::label('date_to', 'To') }}
                    </div>
                    {{ Form::date('date_to', $date_to, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-1 text-right" style="padding-top:4px; padding-right:10px">
                <br/>
                    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }} 
                </div>
            </div>
           
        {!! Form::close() !!}
        
            <br/>
         
            <div class="row">
                <div class="col-md-2" style="margin:0px 20px 20px 20px; padding:0px">
                    <p><i class="fa fa-user"></i>Employee Name</p>
                    <h4 style="padding:0px">{{ $fullname }}</h4>
                </div>
                <div class="col-md-2" style="margin:0px 20px 20px 20px; padding:0px">
                    <p><i class="fa fa-calendar"></i>Working</p>
                    <h4 style="padding:0px">20 Days</h4>
                </div>
                <div class="col-md-2" style="margin:0px 20px 20px 20px; padding:0px">
                    <p><i class="fa fa-user"></i>Worked</p>
                    <h4 style="padding:0px">{{ count($attendances) }} Days</h4>
                </div>
                <div class="col-md-2" style="margin:0px 20px 20px 20px; padding:0px">
                    <p><i class="fa fa-user"></i>Total Hours</p>
                    <h4 style="padding:0px">{{ floor($hours / 3600) }} Hours</h4>
                </div>
            </div>
            
            <div class="table-responsive" style="overflow-y: hidden;">
                <table class="table table-striped table-bordered table-hover">
                    @if(count($attendances) > 0)
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>Working Hours</th>
                            <th>Campus</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->visited }}</td>
                                    <td>{{ $attendance->from }}</td>
                                    <td>{{ $attendance->to }}</td>
                                    <td>{{ date('H:i', (strtotime($attendance->to) - strtotime($attendance->from))) }} Hours</td>
                                    <td>{{ $attendance->campus }}</td>
                                    <td>present</td>
                                </tr>
                            @endforeach
                        @else
                            <p class="alert alert-warning" style="margin:0px;">No Report Data</p>
                        @endif
                    </tbody>       
                </table>
            </div>
        @else
        {!! Form::open(['action' => 'AttendanceReportController@search', 'method' => 'GET']) !!}
            <div class="row" style="padding: 5px">
                <div class="col-md-5 text-right">
                <div class="text-left">
                    {{ Form::label('fullname', 'Select Employee') }}
                </div>
                {{ Form::select('fullname', $employees, null, 
                    [
                        'class' => 'form-control', 'placeholder' => '-Employee-'
                    ]) 
                }}
                </div>
                <div class="col-md-3 text-left">
                    <div class="text-left">
                        {{ Form::label('date_from', 'From') }}
                    </div>
                    {{ Form::date('date_from', '', ['class' => 'form-control']) }}
                </div>
                <div class="col-md-3 text-left">
                    <div class="text-left">
                        {{ Form::label('date_to', 'To') }}
                    </div>
                    {{ Form::date('date_to', '', ['class' => 'form-control']) }}
                </div>
                <div class="col-md-1 text-right" style="padding-top:4px; padding-right:10px">
                <br/>
                    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }} 
                </div>
            </div>
        
        {!! Form::close() !!}
        
            <br/>
            <p class="alert alert-info" style="margin:0px;">Select an employee and choose the dates</p>
        @endif
    </div>
</div>


@endsection