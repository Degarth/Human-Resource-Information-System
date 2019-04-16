@extends('layout.app')

@section('content')
   
<!--<div class="header"> 
            <div class="page-header">
              
            </div>				
</div>-->
<div class="header"> 
    <h1 class="page-header">
        Dashboard <small>Welcome David James</small>
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
                    <h3>11</h3>
                    <small>Pending Leave</small>
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
                    Leave applications approved/rejected
                </div>
                <div class="panel-body">
                    <div id="morris-bar-chart"></div>
                </div>
            
        </div>  
        </div>
        
    </div> 
    
    
    
    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">                            
                <div class="panel-heading">
                Area Chart
            </div>
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Donut Chart Example
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
    <div class="col-md-12">
    
        </div>		
    </div> 	
    <!-- /. ROW  -->


    
    
    
    <div class="row">
        
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Responsive Table Example
                </div> 
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Email ID.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>John15482</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kimsila</td>
                                    <td>Marriye</td>
                                    <td>Kim1425</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rossye</td>
                                    <td>Nermal</td>
                                    <td>Rossy1245</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Richard</td>
                                    <td>Orieal</td>
                                    <td>Rich5685</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Jacob</td>
                                    <td>Hielsar</td>
                                    <td>Jac4587</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Wrapel</td>
                                    <td>Dere</td>
                                    <td>Wrap4585</td>
                                    <td>name@site.com</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /. ROW  -->


    <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p>
    

    </footer>
</div>
<!-- /. PAGE INNER  -->
@endsection