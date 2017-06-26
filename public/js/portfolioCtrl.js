var portfolioApp = angular.module('portfolioService', ['ngRoute']);


var base_api_url = 'http://staging-portfolio.briteinvest.com';


portfolioApp.config(function($routeProvider){
	$routeProvider
		.when('/', {
			templateUrl : 'templates/overall.html',
			controller  : 'overallCtrl'
		})
		.when('/historical', {
			templateUrl : 'templates/historical.html',
			controller : 'historicalController'
		})
		.when('/overall', {
			templateUrl: 'templates/overall.html',
			controller: 'overallCtrl'
		})
		.when('/allocation', {
			templateUrl: 'templates/allocation.html',
			controller: 'allocationCtrl'
		})
		.when('/investments', {
			templateUrl: 'templates/investments.html',
			controller: 'investmentsCtrl'
		});
});


portfolioApp.run(['$http', '$rootScope', function($http, $rootScope){
	$rootScope.AccountInfo = {};
	$http({
		method: 'GET',
		url: base_api_url + '/getaccinfo?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614',
	}).then(function successCallback(response){
		console.log(response.data);
		$rootScope.AccountInfo = response.data;	
		localStorage.setItem('userData', JSON.stringify(response.data));
	});
}]);


portfolioApp.controller('mainCtrl',  ['$scope', '$rootScope', function($scope, $rootScope){
	$scope.page = {};
	$scope.page.CV = "Overall Performance";
}]);

portfolioApp.controller('historicalController', ['$scope', '$rootScope', function($scope, $rootScope){
	$scope.page.CV = "Historical Performance";
}]);

portfolioApp.controller('overallCtrl', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http){
	$scope.page.CV = "Overall Performance";
	$rootScope.Currency = {};
	$http({
		method: 'GET',
		url: base_api_url + '/getaccinfo?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614',
	}).then(function successCallback(response){
		$rootScope.Currency = response.data.Currency;
	}, function errorCallback(response){
		console.log("Error in callback");
	});
}]);


portfolioApp.controller('allocationCtrl', ['$scope', '$http', function($scope, $http){
	$scope.page.CV = "Portfolio Allocation";	
	$http({
		method: 'GET',
		url: base_api_url + '/getmarketshare?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614',
	}).then(function(response){
	})
	// Google Chart
	google.charts.load('current', {'packages': ['corechart']});
	google.charts.setOnLoadCallback(drawChart);	
	function drawChart() {
		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'Slices');
		console.log(allocationData);
		data.addRows([
		  ['Developed Markets', allocationData.Developed_Markets],
		  ['Domestic Markets', allocationData.Domestic_Markets ],
		  ['Fixed Income', allocationData.Fixed_Income]
		]);

		// Set chart options
		var options = { 'width':600,
			       'height':400};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
}]);

portfolioApp.controller('investmentsCtrl', ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope){
	$scope.page.CV = "Investments List";
	$scope.currency = $rootScope.AccountInfo.Currency; 
	$scope.data = {};
	$http({
		cache: true,
		method: 'GET',
		url: 'http://staging-portfolio.briteinvest.com/getportfolio?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614',
	}).then(function successCallback(response){
		$scope.data = response.data;
	}, function errorCallback(response){
		console.log("Error in callback (2nd)");	
	});
}]);
