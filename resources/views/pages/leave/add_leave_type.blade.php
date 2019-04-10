@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Add Leave Type
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Leave</a></li>
        <li class="active">Add</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:#EDEDED">
        {!! Form::open(['action' => 'LeaveTypesController@store', 'method' => 'POST']) !!}
        <div class="form-group" style="padding-right:33%">
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('name', 'Name') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('allowance', 'Allowance per year') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('allowance', '', ['class' => 'form-control', 'placeholder' => 'Allowance per year']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('description', 'Description') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) }}
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ Form::submit('Add New Leave Type', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>



@endsection