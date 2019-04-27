@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Add Department
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Department</a></li>
        <li class="active">Add</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white">
        {!! Form::open(['action' => 'DepartmentsController@store', 'method' => 'POST']) !!}
        <div class="form-group" style="padding-right:33%">
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('name', 'Department Name') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Department Name']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('head', 'Department Head') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('head', '', ['class' => 'form-control', 'placeholder' => 'Department Head']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('details', 'Details') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('details', '', ['class' => 'form-control', 'placeholder' => 'Details']) }}
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ Form::submit('Add New Department', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection