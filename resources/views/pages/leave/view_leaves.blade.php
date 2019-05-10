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
    @if(count($leaves) > 0)
        <form method="POST">
                @csrf
                @method('DELETE')

        <div class="panel panel-primary">
            <div class="panel-heading">
                Leaves
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
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-dark">
                            
                                @foreach($leaves as $leave)
                                    <tr>
                                        <td>{{ $leave->created_at }}</td>
                                        <td>{{ $leave->user->name }}</td>
                                        @if($leave->type_id == null)
                                            <td>Type Was Removed</td>
                                        @else
                                            <td>{{ $leave->type->name }}</td>
                                        @endif
                                        <td>{{ $leave->from }}</td>
                                        <td>{{ $leave->to }}</td>
                                        <td>{{ $leave->reason }}</td>
                                    
                                        @if($leave->status == 'Approved')
                                            <td style="background-color:#5cb85c">{{ $leave->status }}</td>
                                            <td>
                                                <a class="btn btn-danger" href="/reject/{{ $leave->id }}">Reject Request</a> 
                                            </td>
                                        @elseif($leave->status == "Rejected")
                                            <td style="background-color:#d9534f">{{ $leave->status }}</td>
                                            <td>
                                                <a class="btn btn-success" href="/approve/{{ $leave->id }}">Approve Request</a>
                                            </td>
                                        @else
                                            <td>{{ $leave->status }}</td>
                                            <td>
                                                <a class="btn btn-success" href="/approve/{{ $leave->id }}">Approve Request</a>
                                                <a class="btn btn-danger" href="/reject/{{ $leave->id }}">Reject Request</a> 
                                            </td>
                                        @endif
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
            <p class="alert alert-warning" style="margin:0px;">No Leaves Found</p>
        </div>
    @endif
</div>

@endsection