@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        New Employee
    </h1>
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li><a href="/view-employees">Employee</a></li>
        <li class="active">New</li>
    </ol>               
</div>
<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white"><!--#EDEDED-->
        {!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('firstname', 'First Name') }}
                    {{ Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'First Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', 'Last Name') }}
                    {{ Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('gender', 'Gender') }}
                    {{ Form::select('gender', ['Male' => 'Male', 'Woman' => 'Woman'], null, 
                        [
                            'class' => 'form-control', 'placeholder' => '-Gender-'
                        ]) 
                    }}
                </div>
                <div class="form-group"> 
                    {{ Form::label('birthday', 'Birthday') }}
                    {{ Form::date('birthday', '', ['class' => 'form-control', 'placeholder' => 'Birthday']) }}
                </div> 
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) }}
                </div> 
                <div class="form-group">
                    {{ Form::label('email', 'E-mail') }}
                    {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('telephone', 'Telephone') }}
                    {{ Form::text('telephone', '', ['class' => 'form-control', 'placeholder' => 'Telephone']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('salary', 'Salary') }}
                    {{ Form::text('salary', '', ['class' => 'form-control', 'placeholder' => 'Salary']) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('position', 'Position') }}
                    {{ Form::text('position', '', ['class' => 'form-control', 'placeholder' => 'Position']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('department', 'Department') }}
                    {{ Form::select('department', $departments, null, 
                        [
                            'class' => 'form-control', 'placeholder' => '-Department-'
                        ]) 
                    }}
                </div> 
                <div class="form-group">
                    {{ Form::label('campus_id', 'Campus') }}
                    {{ Form::select('campus_id', $campuses, null, 
                        [
                            'class' => 'form-control', 'placeholder' => '-Campus-'
                        ]) 
                    }}
                </div>
                <div class="form-group">
                    {{ Form::label('Photo') }}
                    <div class="form-control">
                        {{ Form::file('avatar') }}
                    </div>
                </div>
            </div>
            <div class="text-right col-md-12">  
                {{ Form::submit('Add New Employee', ['class' => 'btn btn-primary']) }}
            </div> 
        {!! Form::close() !!}
    </div>
</div>
@endsection