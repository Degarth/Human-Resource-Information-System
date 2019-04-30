@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        All Leaves
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Leave</a></li>
        <li class="active">View</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary" style="padding:20px;background-color:white">
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
                        
                    </tbody>
                @else
                    <p class="alert alert-warning" style="margin:0px;">No Leaves Data</p>
                @endif       
                </table>
                
            </div>
    </div>
</div>

@endsection