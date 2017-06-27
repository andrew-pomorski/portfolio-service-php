<!DOCTYPE html>
<html>
  <head>
    <title>Portfolio Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script> 
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
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Currently viewing: <span class="currently-viewing">{{ page.CV }}</span></h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 ">
              <span><a class="btn btn-default" href="#!overall">Overall Portfolio</a></span>
            </div>
            <div class="col-xs-6 col-sm-3 ">
              <span><a class="btn btn-default" href="#!allocation">Portfolio Allocation</a></span>
            </div>
            <div class="col-xs-6 col-sm-3 ">
              <span ><a class="btn btn-default" href="#!investments">List of Investments</a></span>
            </div>
            <div class="col-xs-6 col-sm-3 ">
              <span><a class="btn btn-default" href="#!historical">Historical Performance</a></span>
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

