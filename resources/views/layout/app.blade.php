<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>{{ config('app.name', 'Personnel') }}</title>
    <!-- Bootstrap Styles-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('assets/css/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.6.1/css/all.css')}}" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/js/Lightweight-Chart/cssCharts.css')}}"> 
</head>

<body>
    <div id="wrapper">
        @include('inc.nav')
        <div id="page-wrapper">
            
            @yield('content')
        </div>
    </div>

    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
    <!-- Bootstrap Js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    
    <!-- Metis Menu Js -->
    <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
    <!-- Morris Chart Js -->
    <script src="{{asset('assets/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('assets/js/morris/morris.js')}}"></script>
    
    
    <script src="{{asset('assets/js/easypiechart.js')}}"></script>
    <script src="{{asset('assets/js/easypiechart-data.js')}}"></script>
    
    <script src="{{asset('assets/js/Lightweight-Chart/jquery.chart.js')}}"></script>
    
    <!-- Custom Js -->
    <script src="{{asset('assets/js/custom-scripts.js')}}"></script>

    
    <!-- Chart Js -->
    <script type="text/javascript" src="{{asset('assets/js/Chart.min.')}}"></script>  
    <script type="text/javascript" src="{{asset('assets/js/chartjs.js')}}"></script> 

</body>

</html>