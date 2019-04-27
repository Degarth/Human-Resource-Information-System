@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Add One Attendance
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Attendance</a></li>
        <li class="active">Add</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white">
        {!! Form::open(['action' => 'AttendanceController@store', 'method' => 'POST']) !!}
        <div class="form-group" style="padding-right:33%">
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('employeeId', 'Employee') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::select('employeeId', $employees, null, 
                        [
                            'class' => 'form-control', 'placeholder' => '-Employee-'
                        ]) 
                    }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('visited', 'Date') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::date('visited', '', ['class' => 'form-control', 'placeholder' => 'Date']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('from', 'From') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::time('from', \Carbon\Carbon::createFromFormat('H:i', '08:00', 'Europe/Vilnius'), ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('to', 'To') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::time('to', \Carbon\Carbon::createFromFormat('H:i', '17:00', 'Europe/Vilnius'), ['class' => 'form-control', 'placeholder' => 'To']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('campus', 'Campus') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::select('campus', $campuses, null, 
                        [
                            'class' => 'form-control', 'placeholder' => '-Campus-'
                        ]) 
                    }}
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ Form::submit('Add Attendance', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection