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
                <div class="col-md-1 text-right" style="padding-top:4px; padding-right:10px">
                <br/>
                    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }} 
                </div>
            </div>
           
        {!! Form::close() !!}
        
        <br/>
            
        <div class="table-responsive" style="overflow-y: hidden;">
            @if(count($leaves) > 0)
                <table class="table table-striped table-bordered table-hover">        
                    <thead>
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
                            @foreach($leaves->unique('user_id') as $leave)
                  
                                <tr>
                                    <td>{{ $leave->user->email }}</td>
                                    @foreach($types as $type)
                                        <td>{{$leaves->where('type_id', '=', $type->id)
                                        ->where('user_id', '=', $leave->user->id)
                                        ->where('status', '=', 'Approved')->count()}}</td>
                                    @endforeach
                                </tr>
                                
                            @endforeach
                        
                    </tbody> 
                        
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