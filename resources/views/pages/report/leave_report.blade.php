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
       
        
        {!! Form::open(['action' => 'LeaveReportController@search', 'method' => 'GET']) !!}
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
                <div class="col-md-1 text-left" style="padding-top:4px; padding-right:10px">
                <br/>
                    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }} 
                </div>
                <div class="col-md-1 text-right" style="padding-top:23px; padding-right:10px">
                    <a class="btn btn-warning" href="/leave-report">All Leaves</a>
                </div>
            </div>
           
        {!! Form::close() !!}
        
        <br/>
            
        <div class="table-responsive" style="overflow-y: hidden;">
            @if(count($leaves) > 0)
                <table class="table  table-bordered table-hover">        
                    <thead style="background-color:lightskyblue">
                        <tr>
                            <th>Name</th>
                            @foreach($types as $type)
                                @if($type->id != null)
                                    <th>{{ $type->name }}</th>
                                @else
                                    <th>Other</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                           
                        @foreach($leaves->unique('employee_id') as $leave)
            
                            <tr>
                                <td>{{ $leave->employee->firstname }} {{ $leave->employee->lastname }}</td>

                                @foreach($types as $type)
                                    <td>{{$leaves->where('type_id', '=', $type->id)
                                    ->where('employee_id', '=', $leave->employee->id)
                                    ->where('status', '=', 'Approved')->count()}}</td>
                                @endforeach
                            </tr>
                            
                        @endforeach
                         
                    </tbody> 
                    <tr><td></td></tr>
                    <thead style="background-color:lightskyblue">
                        <tr>
                            <th>Total Employees</th>
                            @foreach($types as $type)
                                @if($type->id != null)
                                    <th>Total {{ $type->name }}</th>
                                @else
                                    <th>Total {{ $type->name }}</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>{{ $leaves->unique('user_id')->count() }}</td>
                            @foreach($types as $type)
                                @if($type->id != null)
                                    <td>{{ $leaves->where('status', '=', 'Approved')
                                                  ->where('type_id', '=', $type->id)->count() }} </td>
                                @endif
                            @endforeach
                        </tr>
                    </tfoot>   
                </table>
                <div class="text-center">
                    {{ $leaves->Links() }}
                </div>
            @else
                <div class="panel panel-primary" style="padding:20px;background-color:white">
                    <p class="alert alert-warning" style="margin:0px;">No Report Data</p>
                </div>
            @endif 
        </div>
    </div>
</div>

@endsection