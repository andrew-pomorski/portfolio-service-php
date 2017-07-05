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
		$rootScope.AccountInfo = response.data;	
		localStorage.setItem('userData', JSON.stringify(response.data));
	}, function failureCallback(response){
		// TODO: handle that.
	});
}]);


portfolioApp.controller('mainCtrl',  ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http){
	$scope.page = {};
	$scope.page.CV = "Overall Performance";
}]);

portfolioApp.controller('historicalController', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http){
        $scope.page.CV = "Historical Performance";
	$http({
		cache: true,
		method: 'GET',
		url: base_api_url + '/gethistorical?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614'
	}).then(function successCallback(res){
		var chartDataValue = [];
		var chartDataLabels = [];
		var chartDataObjDate = [];
		var arrLen = res.data.length;
		for (var i = 0; i < arrLen; i++){
			chartDataValue.push(res.data[i].Total);
			chartDataLabels.push((a = new Date(res.data[i].Date), `${a.getMonth()}/${a.getFullYear()}`));
			chartDataObjDate.push(new Date(res.data[i].Date))
		}
		var ctx_total = document.getElementById('historical_chart_total').getContext('2d');
		ctx_total.canvas.height = 300;
		ctx_total.canvas.width = 900;
		var chart = new Chart(ctx_total, {
			type: 'line',
			options: {
				elements: {
					point: {
						radius: 0
					},
					line: {
						fill: false
					}
				},
				legend: {
					display: false,
					position: 'bottom'
				},
				responsive: false,
				maintainAspectRatio: false,
			},
			data: {
				labels: chartDataLabels,
				datasets: [{
					data: chartDataValue
				}]
			}
		});
		var ctx_diff = document.getElementById('historical_chart_diff').getContext('2d');
		ctx_diff.canvas.height = 300;
		ctx_diff.canvas.width = 900;
		var chart_diff = new Chart(ctx_diff, {
			type: 'line',
			options: {
				elements: {
					point: {
						radius: 0
					},
					line: {
						fill: false
					}
				},
				legend: {
					display: false,
					position: 'bottom'
				},
				responsive: false,
				maintainAspectRatio: false,
			},
			data: {
				labels: chartDataLabels,
				datasets: [{
					data: chartDataObjDate
				}]
			}
		});

	});
}]);

portfolioApp.controller('overallCtrl', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http){
	$scope.page.CV = "Overall Performance";
	$rootScope.Currency = {};
	$http({
		cache: true,
		method: 'GET',
		url: base_api_url + '/gethistorical?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614',
	}).then(function successCallback(response){
		// TODO: loop throug response obj and append to arr.
		var chartDataValue = [];
		var chartDataDates = [];
		var arrLen = response.data.length;
		for (var i = 0; i < arrLen; i++){
			chartDataValue.push(response.data[i].Value);
			// (a=new Date("2016-08-16T00:00:00Z"),`${a.getMonth()}/${a.getFullYear()}`) 
			chartDataDates.push((a = new Date(response.data[i].Date), `${a.getMonth()}/${a.getFullYear()}`));
		}
		var ctx = document.getElementById('overall_chart').getContext('2d');
		ctx.canvas.height = 300;
		ctx.canvas.width = 900;
		var chart = new Chart(ctx, {
			type: 'line',
			options: {
				elements: {
					point: {
						radius: 0
					}
				},
				legend: {
					display: false,
					position: 'bottom'
				},
				responsive: false,
				maintainAspectRatio: false,
			},
			data: {
				labels: chartDataDates,
				datasets: [{
					data: chartDataValue,
				}]

			}

		});
	}, function errorCallback(response){
		console.log("Error in callback");
	});
}]);


portfolioApp.controller('allocationCtrl', ['$scope', '$http', function($scope, $http){
	$scope.page.CV = "Portfolio Allocation";	
	$http({
		cache: true,
		method: 'GET',
		url: base_api_url + '/getmarketshare?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614',
	}).then(function successCallback(response){
		console.log(response.data.Developed_Markets);	
		// TODO: Initialize a chart here.
		var ctx = document.getElementById('allocation_chart').getContext('2d');
		ctx.canvas.height = 500;
		ctx.canvas.width = 500;
		var chart = new Chart(ctx, {
			type: 'doughnut',
			options: {
				legend: {
					display: true,
					position: 'right'
				},
				responsive: false,
				MaintainAspectRatio: false
			},
			data: {
				labels: ['Developed Markets', 'Domestic Markets', 'Fixed Income'],
				datasets: [{
					data: [
						Math.round(response.data.Developed_Markets * 100) / 100 , 
						Math.round(response.data.Domestic_Markets * 100) / 100, 
						Math.round(response.data.Fixed_Income * 100) /100
					],
					backgroundColor: [
						'#FF6384',
						'#36A2EB',
						'#FFCE56'
					], 
					hoverBackgroundColor: [
						'#FF6384',
						'#36A2EB',
						'#FFCE56'
					] 
				}],
				
			}
		});	
	}, function failureCallback(response){
		// FIXME: handle that.
	});
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
