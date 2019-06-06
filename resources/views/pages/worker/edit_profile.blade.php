@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        {{ $employee->firstname }} {{ $employee->lastname }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li><a href="/profile">Profile</a></li>
        <li class="active">Edit</li>
        <a class="pull-right" href="/profile">Go Back</a>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white">
        {!! Form::open(['action' => ['EmployeesController@updateProfile', $employee->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('firstname', 'First Name') }}
                    {{ Form::text('firstname', $employee->firstname, ['class' => 'form-control', 'placeholder' => 'First Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', 'Last Name') }}
                    {{ Form::text('lastname', $employee->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('gender', 'Gender') }}
                    {{ Form::select('gender', ['Male' => 'Male', 'Woman' => 'Woman'], $employee->gender, 
                        [
                            'class' => 'form-control', 'placeholder' => 'Gender'
                        ]) 
                    }}
                </div>
                <div class="form-group"> 
                    {{ Form::label('birthday', 'Birthday') }}
                    {{ Form::date('birthday', $employee->birthday, ['class' => 'form-control', 'placeholder' => 'Birthday']) }}
                </div> 
            </div>
            <div class="col-md-4"> 
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', $employee->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}
                </div> 
                <div class="form-group">
                    {{ Form::label('email', 'E-mail') }}
                    {{ Form::text('email', $employee->email, ['class' => 'form-control', 'placeholder' => 'E-mail']) }}
                </div>              
                <div class="form-group">
                    {{ Form::label('telephone', 'Telephone') }}
                    {{ Form::text('telephone', $employee->telephone, ['class' => 'form-control', 'placeholder' => 'Telephone']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Photo') }}
                    <div class="form-control">
                        {{ Form::file('avatar') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
                {{ Form::label('Photo') }}   
                <div class="well">
                    <img style="width:100%" src="/storage/avatars/{{$employee->avatar}}"/>
                </div>
            </div>
            <div class="text-right col-md-12">  
                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
            </div> 
        {!! Form::close() !!}
    </div>
</div>
@endsection