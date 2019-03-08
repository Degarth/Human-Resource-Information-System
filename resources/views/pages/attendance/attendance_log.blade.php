@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Attendance Log
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li><a>Attendance</a></li>
        <li class="active">Log</li>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Employees Attendance Log
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Date</th>
                            <th>Campus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($attendances) >= 1)
                            @foreach($attendances as $attendance)

                            @endforeach
                            {{ $attendances->Link() }}
                        @else
                            <p class="alert alert-warning" style="margin:0px;">Attendance Log Is Empty</p>
                        @endif
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection