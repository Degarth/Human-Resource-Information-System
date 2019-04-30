@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Leave Report
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Reports</a></li>
        <li class="active">Leave</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white">
       
        
        {!! Form::open(['action' => 'AttendanceReportController@search', 'method' => 'GET']) !!}
            <div class="row" style="padding: 5px">
                <div class="col-md-5 text-right">
                    <div class="text-left">
                        {{ Form::label('fullname', 'Search Employee') }}
                    </div>
                    {{ Form::select('fullname', $employees, null, 
                        [
                            'class' => 'form-control', 'placeholder' => '-Employee-'
                        ]) 
                    }}
                </div>
                <div class="col-md-1 text-right" style="padding-top:4px; padding-right:10px">
                <br/>
                    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }} 
                </div>
            </div>
           
        {!! Form::close() !!}
        
        <br/>
            
            <div class="table-responsive" style="overflow-y: hidden;">
                <table class="table table-striped table-bordered table-hover">
                    @if(count($leaves) > 0)
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Vacation</th>
                            <th>Medical</th>
                            <th>Unpaid</th>
                            <th>Paid</th>
                            <th>Maternity</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach($leaves as $leave)
                                <tr>
                                    <td>{{ $leave->name }}</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                            @endforeach
                        @else
                            <p class="alert alert-warning" style="margin:0px;">No Report Data</p>
                        @endif
                    </tbody>       
                </table>
            </div>
    </div>
</div>

@endsection