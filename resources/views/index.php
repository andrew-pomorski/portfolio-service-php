<!DOCTYPE html>
<html>
  <head>
    <title>Portfolio Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script type="text/javascript" src="js/changeBg.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"> </script>
    <script src="node_modules/angular-route/angular-route.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/portfolioCtrl.js"></script>
</head>
<body ng-app="portfolioService" ng-controller="mainCtrl">
	
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/brite-logo.png"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-md-4 sidebar" id="side_navbar">
	<!-- Side navbar -->
        </div>
        <div class="col-sm-6 col-sm-offset-6 col-md-8 col-md-offset-4 main">
	 <div class="row"> 
		 <div class="info-text">
			  <h1 class="page-header">Superannuation fund: <span class="currently-viewing">{{ page.SuperFund }}</span></h1>
			  <h2 class="rec-con">View recent contributions</h2>
			  <h1 class="page-header">Currently viewing: <span class="currently-viewing">{{ page.CV }}</span></h1>
		 </div>
	 </div>
	 <span style="border-bottom: 1px solid #eee;"></span>
         <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 ">
              <span><a id="overall_btn" class="btn btn-default" href="#!overall">Overall Portfolio</a></span>
            </div>
            <div class="col-xs-6 col-sm-3 ">
              <span><a id="allocation_btn" class="btn btn-default" href="#!allocation">Portfolio Allocation</a></span>
            </div>
            <div class="col-xs-6 col-sm-3 ">
              <span ><a id="investments_btn" class="btn btn-default" href="#!investments">List of Investments</a></span>
            </div>
            <div class="col-xs-6 col-sm-3 ">
              <span><a id="historical_btn" class="btn btn-default" href="#!historical">Historical Performance</a></span>
            </div>
          </div>

	<div ng-view="" align="center" style="margin-left: auto; margin-right: auto; width: 800px;">
		<!-- ng-view -->
	</div>
        
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>


</body>
</html>

