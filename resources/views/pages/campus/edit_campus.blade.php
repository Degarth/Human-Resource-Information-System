@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Edit Campus
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Campus</a></li>
        <li class="active">Edit</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white">
        {!! Form::open(['action' => ['CampusController@update', $campus->id], 'method' => 'POST']) !!}
        <div class="form-group" style="padding-right:33%">
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('name', 'Campus Name') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('name', $campus->name, ['class' => 'form-control', 'placeholder' => 'Campus Name']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('head', 'Campus Head') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('head', $campus->head, ['class' => 'form-control', 'placeholder' => 'Campus Head']) }}
                </div>
            </div>
            <div class="row" style="padding: 5px">
                <div class="col-md-6 text-right" style="padding-top: 5px">
                    {{ Form::label('description', 'Description') }}
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::text('description', $campus->description, ['class' => 'form-control', 'placeholder' => 'Description']) }}
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Update Campus', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
        </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection