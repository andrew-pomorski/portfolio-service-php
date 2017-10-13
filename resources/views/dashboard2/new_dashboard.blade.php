<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"> </script>
    	<script src="node_modules/angular-route/angular-route.js"></script>
	<link rel="icon" type="image/png" href="img/Logo.ico">
    	<script src="js/portfolioCtrl.js"></script>
	<script src="https://use.fontawesome.com/db70d6b459.js"></script>
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
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body ng-app="portfolioService" ng-controller="mainCtrl">

<div class="wrapper">
    <div class="sidebar" data-color="britegreen" data-image="assets/img/sidebar-5.jpg">


    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
		 	<img src="img/LogoWhiteTrans.png" alt="Brite" style="height: 30px; width: auto;"/>
		</a>
            </div>
		  <!-- <div class="" style="margin-top: 25px;">
			  <p class="subtitle fancy"><span>Welcome to your portfolio</span></p>
		  </div> -->
            <ul class="nav">
                <li>
                    <a href="#!allocation" id="allocation">
                        <!-- <i class="pe-7s-graph"></i> -->
			<i class="fa fa-pie-chart" aria-hidden="true"></i>
                        <p>Portfolio Allocation</p>
                    </a>
                </li>
                <li>
                    <a href="#!investments" id="investments">
			<i class="fa fa-list" aria-hidden="true"></i>
                        <p>List of Investments</p>
                    </a>
                </li>
                <li>
                    <a href="#!historical" id="historical">
                        <!-- <i class="pe-7s-note2"></i> -->
			<i class="fa fa-line-chart" aria-hidden="true"></i>
                        <p>Historical Performance</p>
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
                    <a id="currently_viewing" style="margin: 10px;" class="navbar-brand"></a>
                </div>
                <div class="collapse navbar-collapse">
                   	<!-- 
			<ul id="currently_viewing" class="nav navbar-nav navbar-left">
			</ul>
			-->
		    

                    <ul class="nav navbar-nav navbar-right">
                        <li>
				<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">
				 <i class="fa fa-lock logout-icon" aria-hidden="true"></i>&nbsp;Logout
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
		<!-- btn row
		<div class="row nav-btn-row">
			<div class="text-center col-md-12 col-sm-12 col-lg-12 col-xs-12">
				<a id="allocation" type="button" class="btn btn-portfolio-nav" href="#!allocation">Portfolio Allocation</a>
				<a id="investments" type="button" class="btn btn-portfolio-nav" href="#!investments">List of Investments</a>
				<a id="historical" type="button" class="btn btn-portfolio-nav" href="#!historical">Historical Performance</a>
			</div>
		</div>
		// btn row -->
                <!-- charts area -->
		<div class="row main-charts-row">
                	<div style="" class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center" ng-view="">
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
            <div class="container-fluid footer-brite">
                <nav class="pull-left">
			<div class="text-center" style="width: 75%; margin: 0 auto;">
                	<p class="text-center footer-text">
				Brite is powered in Australia by Brite Advisors Pty Ltd, company number 135024412, by their Australian Financial Services Licence, number 337670. We are located at Shop 4, 1-5 Piper Street, Caboolture, QLD, 4510.
			</p>
			<p class="text-center footer-text">
				Brite is powered in Hong Kong by Watermill Advisors Limited, company number 1633223, by their Securities and Futures Commission Licence, number AYD086. We are located at Unit A, 16/F, Harbourfront House, 35-36 Connaught Road West, Sheung Wan, Hong Kong.	
			</p>
			</div>
		</nav>
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


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		
			var FundName = localStorage.getItem('userData');
			var FundName = JSON.parse(FundName);
			var FundName = FundName[0].FundName;
			
			console.log("local storage: " + JSON.stringify(FundName));
			$("#overall").on('click', function(){
				console.log('clicked overall')	
				$("#currently_viewing").html("");
			});			

			$("#allocation").on('click', function(){
				console.log('clicked allocation')	
				$("#currently_viewing").html("Portfolio Allocation");
			});			
			
			$("#investments").on('click', function(){
				console.log('clicked investments');	
				$("#currently_viewing").html("List of Investments");
			});
						
			$("#historical").on('click', function(){
				console.log('clicked historical')	
				$("#currently_viewing").html("Historical Performance");
			});			
		});
	</script>

</html>
