@extends('layout.app')

@section('content')

<div class="header"> 
    <h1 class="page-header">
        Employee Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
        <li><a href="/view-employees">Employees</a></li>
        <li class="active">{{ $employee->firstname }} {{ $employee->lastname }}</li>
        <a class="pull-right" href="/view-employees">Go Back</a>
    </ol>               
</div>

<div id="page-inner">
    <div class="panel" style="padding:20px">
        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="well">
                    <img style="width:100%" src="/storage/avatars/{{$employee->avatar}}"/>
                    </div>
                    <h2>{{ $employee->firstname }} {{ $employee->lastname }}</h2>
                    <p><i class="fa fa-location-arrow"></i> {{ $employee->address }}</p>
                    <p><i class="fa fa-"></i> {{ $employee->position }}</p>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#personal">Personal Details</a></li>
                    <li><a data-toggle="tab" href="#employment">Employment Details</a></li>
                    <li><a data-toggle="tab" href="#document">Document</a></li>
                </ul>
                
                <div class="tab-content">
                    <div id="personal" class="tab-pane fade in active">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Personal Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>{{ $employee->gender }}
                                    </tr>
                                    <tr>
                                        <td>Birthday:</td>
                                        <td>{{ $employee->birthday }}
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{ $employee->email }}
                                    </tr>
                                    <tr>
                                        <td>Mobile Number:</td>
                                        <td>{{ $employee->telephone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="employment" class="tab-pane fade">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Employment Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Campus:</td>
                                        <td>{{ $employee->campus }}
                                    </tr>
                                    <tr>
                                        <td>Department:</td>
                                        <td>{{ $employee->department }}
                                    </tr>
                                    <tr>
                                        <td>Position:</td>
                                        <td>{{ $employee->position }}
                                    </tr>
                                    <tr>
                                        <td>Salary:</td>
                                        <td>{{ $employee->salary }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Joined:</td>
                                        <td>{{ $employee->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="document" class="tab-pane fade">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CV:</td>
                                        <td>Download</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection