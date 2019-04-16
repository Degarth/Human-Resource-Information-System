@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Edit Department
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Department</a></li>
        <li class="active">Edit</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:#EDEDED">
        {!! Form::open(['action' => ['DepartmentsController@update', $department->id ], 'method' => 'POST']) !!}
        <div class="form-group" style="padding-right:33%">
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('name', 'Department Name') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('name', $department->name, ['class' => 'form-control', 'placeholder' => 'Department Name']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('head', 'Department Head') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('head', $department->head, ['class' => 'form-control', 'placeholder' => 'Department Head']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('details', 'Details') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('details', $department->details, ['class' => 'form-control', 'placeholder' => 'Details']) }}
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Edit Department', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection()