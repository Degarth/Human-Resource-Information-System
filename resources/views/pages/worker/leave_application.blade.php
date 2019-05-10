@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Leave Application
    </h1>
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li><a>Leave</a></li>
        <li class="active">Application</li>
    </ol>               
</div>

<div id="page-inner">
    @if(count($types) > 0)
        <div class="panel panel-primary" style="padding:20px;background-color:white">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        {!! Form::open(['action' => 'LeavesController@store', 'method' => 'POST']) !!}
                        <div class="form-group" >
                            <div class="row" style="padding: 5px">
                                <div class="col-md-4 text-right" style="padding-top: 5px">
                                    {{ Form::label('type_id', 'Type of Leave') }}
                                </div>
                                <div class="col-md-8 text-left">
                                    {{ Form::select('type_id', $types_list, null, 
                                    [
                                        'class' => 'form-control', 'placeholder' => '-Type-'
                                    ]) 
                                }}
                                </div>
                            </div>
                            <div class="row" style="padding: 5px">
                                <div class="col-md-4 text-right" style="padding-top: 5px">
                                    {{ Form::label('from', 'Start Date') }}
                                </div>
                                <div class="col-md-8 text-left">
                                    {{ Form::date('from', '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row" style="padding: 5px">
                                <div class="col-md-4 text-right" style="padding-top: 5px">
                                    {{ Form::label('to', 'End Date') }}
                                </div>
                                <div class="col-md-8 text-left">
                                    {{ Form::date('to', '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="row" style="padding: 5px">
                                <div class="col-md-4 text-right" style="padding-top: 5px">
                                    {{ Form::label('reason', 'Reason') }}
                                </div>
                                <div class="col-md-8 text-left">
                                    {{ Form::textarea('reason', '', ['class' => 'form-control', 'placeholder' => 'Write your reason...']) }}
                                </div>
                            </div>
                        </div>
                        <div class="text-center" style="padding-left:35%">
                            {{ Form::submit('Submit', ['class' => 'btn btn-success', 'style' => 'border-radius:0']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Leave Types Allowance
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive" style="overflow-y: hidden">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Allowance</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-dark">
                                            
                                                @foreach($types as $type)
                                                    <tr>
                                                        <td>{{ $type->name }}</td>
                                                        <td>{{ ($type->allowance)-$ }} Days</td>        
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        {{ $types->Links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    @else
        <div class="panel panel-primary" style="padding:20px;background-color:white">
            <p class="alert alert-warning" style="margin:0px;">Applications on hold: Admin has not set any leave types</p>
        </div>
    @endif
    
</div>



@endsection