<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"> </script>
    	<script src="node_modules/angular-route/angular-route.js"></script>
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    	<script src="js/portfolioCtrl.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Portfolio Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->
    <link href="assets/css/dashboard.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body ng-app="portfolioService" ng-controller="mainCtrl">

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
		 	<img src="img/LogoWhiteTrans.png" alt="Brite" style="height: 50px; width: auto;"/>
		</a>
            </div>

            <ul class="nav">
                <li>
                    <a href="#">
                        <i class="pe-7s-graph"></i>
                        <p>Place</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-user"></i>
                        <p>For</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>Legal</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-news-paper"></i>
                        <p>Footer</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">Brite</a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <!--
			TODO: might be useful later... 
			<ul class="nav navbar-nav navbar-left">
                    	</ul>
		    -->

                    <ul class="nav navbar-nav navbar-right">
                        <li>
				<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">
				Logout
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
				</form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
		<div class="row nav-btn-row">
			<div class="text-center col-md-12 col-sm-12 col-lg-12 col-xs-12">
				<!-- <a id="overall" type="button" class="btn btn-portfolio-nav" href="#!overall">Overall Portfolio</a> -->
				<a id="allocation" type="button" class="btn btn-portfolio-nav" href="#!allocation">Portfolio Allocation</a>
				<a id="investments" type="button" class="btn btn-portfolio-nav" href="#!investments">List of Investments</a>
				<a id="historical" type="button" class="btn btn-portfolio-nav" href="#!historical">Historical Performance</a>
			</div>
		</div>
                <!-- charts area -->
		<div class="row main-charts-row">
                	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center" ng-view="">
			</div>
		</div>
		<!-- //charts area -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                               Legal 
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            	Stuff 
			    </a>
                        </li>
                        <li>
                            <a href="#">
                            	Goes
			    </a>
                        </li>
                        <li>
                            <a href="#">
                               Here
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <?php echo date("Y"); ?> <a href="https://www.briteinvest.com">Brite Invest</a>   
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#overall").on('click', function(){
				console.log('clicked overall')	
			});			

			$("#allocation").on('click', function(){
				console.log('clicked allocation')	
			});			
			
			$("#investments").on('click', function(){
				console.log('clicked investments')	
			});
						
			$("#historical").on('click', function(){
				console.log('clicked historical')	
			});			
		});
	</script>

</html>