@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Old Leave Archive
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Leave</a></li>
        <li class="active">Old Archive</li>
    </ol>               
</div>

<div id="page-inner">
    @if(count($leaves) > 0)
        <form method="POST">
                @csrf
                @method('DELETE')

        <div class="panel panel-primary">
            <div class="panel-heading">
                Old Leave Archive
            </div>
            <div class="panel-body">
                <div class="table-responsive" style="overflow-y: hidden">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            
                                @foreach($leaves->where('from', '<', date('Y-m-d')) as $leave)
                                    <tr>
                                        <td>{{ $leave->created_at }}</td>
                                        <td>{{ $leave->employee->firstname }} {{ $leave->employee->lastname }}</td>
                                        @if($leave->type_id == null)
                                            <td>Type Was Removed</td>
                                        @else
                                            <td>{{ $leave->type->name }}</td>
                                        @endif
                                        <td>{{ $leave->from }}</td>
                                        <td>{{ $leave->to }}</td>
                                        <td>{{ date('j', (strtotime($leave->to) - strtotime($leave->from))) }} Days</td>
                                        <td>{{ $leave->reason }}</td>
                                        <td style="background-color:grey">{{ $leave->status }}</td>
                                        <td>
                                            Old Record
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $leaves->Links() }}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="panel panel-primary" style="padding:20px;background-color:white">
            <p class="alert alert-warning" style="margin:0px;">No Old Records Found</p>
        </div>
    @endif
</div>

@endsection