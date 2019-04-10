@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Upload Attendance
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Attendance</a></li>
        <li class="active">Upload</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" >
        <div class="panel-body" id="upload">
            <h4>Upload Attendance Sheet</h4><hr/>
            <p style="padding-top:0px">Select choose file and select attendance excel file </p>
            {!! Form::open(['action' => 'AttendanceController@import', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('Excel File') }}
                    <div class="form-control" style="width:50%">
                        {{ Form::file('attendance') }}
                    </div>
                </div>
                {{ Form::submit('Upload', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection