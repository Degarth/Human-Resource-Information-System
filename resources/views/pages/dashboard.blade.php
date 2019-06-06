@extends('layout.app')

@section('content')
   
<!--<div class="header"> 
            <div class="page-header">
              
            </div>				
</div>-->
<div class="header"> 
    <h1 class="page-header">
        Dashboard <small>Welcome</small>
    </h1>
    <ol class="breadcrumb">
        <li><a>Dashboard</a></li>
        <li class="active">Data</li>
    </ol>               
</div>
<!-- /. PAGE INNER  -->
<div id="page-inner">

    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="board">
            <div class="panel panel-primary">
            <div class="number">
                <h3>
                    <h3>{{ count($employees) }}</h3>
                    <small>Employees</small>
                </h3> 
            </div>
            <div class="icon">
                <i class="fa fa-users fa-5x red"></i>
            </div>

            </div>
            </div>
        </div>
        
                <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="board">
            <div class="panel panel-primary">
            <div class="number">
                <h3>
                    <h3>{{ count($campuses) }}</h3>
                    <small>Campus</small>
                </h3> 
            </div>
            <div class="icon">
                <i class="fa fa-campground fa-5x blue"></i>
            </div>

            </div>
            </div>
        </div>
        
                <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="board">
            <div class="panel panel-primary">
            <div class="number">
                <h3>
                    <h3>{{ count($departments) }}</h3>
                    <small>Department</small>
                </h3> 
            </div>
            <div class="icon">
                <i class="fa fa-building fa-5x green"></i>
            </div>

            </div>
            </div>
        </div>
        
                <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="board">
            <div class="panel panel-primary">
            <div class="number">
                <h3>
                    @if(Auth::user()->email == 'admin@gmail.com')
                        <h3>{{ $leaves->where('status', '=', 'Pending...')
                                      ->where('from', '>', date('Y-m-d'))->count() }}</h3>
                        <small>Pending Leave</small>
                    @else
                        <h3>{{ $leaves->where('status', '=', 'Approved')
                                      ->where('user_id', '=', Auth::user()->id)->count() }}</h3>
                        <small>My Leaves</small>
                    @endif
                </h3> 
            </div>
            <div class="icon">
                <i class="fa fa-check fa-5x yellow"></i>
            </div>

            </div>
            </div>
        </div>
        
    </div>
        
    <div class="row">     
        
        <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
                    New Employees This Week
                </div>
                <div class="panel-body">
                    @if(count($employees->where('created_at', '>', date('Y-m-d', strtotime('-20 days')))) > 0)
                        @foreach($employees->where('created_at', '>', date('Y-m-d', strtotime('-7 days'))) as $employee)
                        <div class="row" style="padding: 10px; margin: 10px;padding-bottom:10px;" >
                            <div class="col-md-2">
                                <div><img style="width:100%" src="/storage/avatars/{{$employee->avatar}}" /></div>
                            </div>
                            <div class="col-md-2">
                                <div><h3>{{$employee->firstname}} {{$employee->lastname}}</h3></div>
                                <div><h4>{{ $employee->position }}</h4></div>
                            </div>
                        </div>
                        <hr style="width: 95%"/>
                        @endforeach
                    @else
                        <div class="panel" style="padding:20px;background-color:white">
                            <p class="alert alert-warning" style="margin:0px;">No New Employees</p><br/>
                        </div>
                    @endif
                </div>  
        </div>  
        </div>
        
    </div>


    <!--<div class="row">
                    
        
            <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
                    Leave applications approved/rejected
                </div>
                <div class="panel-body">
                    <div id="morris-bar-chart"></div>
                </div>
            
        </div>  
        </div>
        
    </div>--> 
    
    
  


    <footer><p>Created by Deividas Januškevičius</a></p>
    

    </footer>
</div>
<!-- /. PAGE INNER  -->
@endsection