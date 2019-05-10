@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Export Attendance
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Attendance</a></li>
        <li class="active">Export</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" >
        <div class="panel-body" id="upload">
            <h4>Export Attendance Sheet</h4><hr/>
            <p style="padding-top:0px">Select export and save file </p>
            {!! Form::open(['action' => 'AttendanceController@export', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('Excel File') }}
                </div>
                @if(count($attendances) > 0)
                    {{ Form::submit('Export', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
                @else
                    {{ Form::submit('Export', ['class' => 'btn btn-success', 'style' => 'border-radius:0', 'disabled' => 'disabled']) }}
                    <br/><br/><p class="alert alert-warning" style="margin:0px;">Button disabled because no attendance data inserted</p>
                @endif
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection