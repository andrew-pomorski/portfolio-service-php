var portfolioApp = angular.module('portfolioService', ['ngRoute']);


var base_api_url = 'https://dashboard.briteinvest.com';
// TODO: Fix this.
var client_id = 'test@briteinvest.com';
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
		url: base_api_url + '/getaccinfo?clientId=' + client_id,
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
		url: base_api_url + '/gethistorical?clientId=' + client_id,
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
		//ctx_total.canvas.height = 300;
		//ctx_total.canvas.width = 900;
		var rawHistoricalArray = res.data;
		var HistoryData = {};
		var HistoricalDatasets = [];
		var HistoricalLabels = [];
		var dataSetsFinal =  [];
		var dataKeyArray = [];
		var colorsArray = ['#1abc9c', '#2ecc71', '#3498db', '#9b59b6', '#f1c40f', '#e67e22', '#e74c3c'];
		// TODO Build dataset array
		var colorIndex = 0;
		var numericLabel = [];
		var i = 0;
		for (var key in rawHistoricalArray){
			HistoryData[key] = rawHistoricalArray[key];
			for (var inKey in rawHistoricalArray[key]) {
				console.log("Value:  :" + HistoryData[key][inKey]['Value'] );
				if (!HistoryData[key][inKey]['Value'] == 0) {
					dataKeyArray.push(HistoryData[key][inKey]['Value']);
				}
				if (!HistoryData[key][inKey]['FundName'] == '') {
					HistoricalLabels.push(HistoryData[key][inKey]['FundName']);
					i++;
					numericLabel.push(i);
				}
				
				dataSetsFinal.push({
					data: dataKeyArray,
					borderColor: colorsArray[colorIndex % colorsArray.length]
				});
			}
			colorIndex++;
		}
		// END
		var chart = new Chart(ctx_total, {
			type: 'line',
			options: {
				elements: {
					line: {
						fill: false
					}
				},
				legend: {
					display: false,
					position: 'bottom'
				}
				//responsive: false,
				//maintainAspectRatio: false,
			},
			data: {
				//labels: HistoricalLabels,
				labels: numericLabel,
				datasets: dataSetsFinal 
			}
		});
		var ctx_diff = document.getElementById('historical_chart_diff').getContext('2d');
		ctx_diff.canvas.height = 300;
		ctx_diff.canvas.width = 900;
		/**
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
				}
				//responsive: false,
				//maintainAspectRatio: false,
			},
			data: {
				labels: chartDataLabels,
				datasets: [{
					data: chartDataObjDate
				}]
			}
		});
		**/

	});
}]);

portfolioApp.controller('overallCtrl', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http){
	$scope.page.CV = "Overall Performance";
	$rootScope.Currency = {};
	$http({
		cache: true,
		method: 'GET',
		url: base_api_url + '/getportfolio?clientId=' + client_id,
	}).then(function successCallback(response){
		// TODO: loop throug response obj and append to arr.
		var chartDataValue = [];
		var chartDataDates = [];
		var chartDataLabels = [];
		var arrLen = response.data.length;
		for (var i = 0; i < arrLen; i++){
			chartDataLabels.push(response.data[i].Ticker);
			chartDataValue.push(Math.round(response.data[i].Value).toFixed(2));
			chartDataCash.push(Math.round(response.data.cash.USD.Value).toFixed(2));
			// (a=new Date("2016-08-16T00:00:00Z"),`${a.getMonth()}/${a.getFullYear()}`) 
			//chartDataDates.push((a = new Date(response.data[i].Date), `${a.getMonth()}/${a.getFullYear()}`));
		}
		var chartDataCash =  response.data.cash.USD[0].Value;
		var chartDataNonCash = response.data.noncash.USD[0].Value;
		var ctx = document.getElementById('overall_chart').getContext('2d');
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
				}
				//responsive: false,
				//maintainAspectRatio: false,
			},
			data: {
				labels: chartDataLabels,
				datasets: [{
					label: 'Cash',
					data: Array.from(chartDataCash)
				},{
					label: 'Non-Cash',
					data: Array.from(chartDataNonCash)
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
		url: base_api_url + '/getmarketshare?clientId=' + client_id,
	}).then(function successCallback(response){
		console.log('market share callback');
		console.log(response.data.Developed_Markets);
		console.log(response.data)	
		// TODO: Initialize a chart here.
		var ctx = document.getElementById('allocation_chart').getContext('2d');
		ctx.canvas.height = 500;
		ctx.canvas.width = 500;
		var chart = new Chart(ctx, {
			type: 'doughnut',
			options: {
				legend: {
					display: true,
					position: 'bottom'
				},
				responsive: false,
				MaintainAspectRatio: false
			},
			data: {
				labels: ['Fixed Income', 'Other', 'Emerging Markets', 'Domestic Markets', 'Developed Markets', 'Commodities'],
				datasets: [{
					data: [
						//Math.round(response.data.Developed_Markets * 100) / 100 , 
						//Math.round(response.data.Domestic_Markets * 100) / 100, 
						Math.round(response.data.Fixed_Income * 100) /100,
						Math.round(response.data.Other * 100) /100,
						Math.round(response.data.Emerging_Markets * 100) /100,
						Math.round(response.data.Domestic_Markets * 100) /100,
						Math.round(response.data.Developed_Markets * 100) /100,
						Math.round(response.data.Commodities * 100) /100,
					],
					backgroundColor: [
						'#FF6384',
						'#36A2EB',
						'#FFCE56',
						'#9b59b6',
						'#2ecc71',
						'#f1c40f'
					], 
					hoverBackgroundColor: [
						'#FF6384',
						'#36A2EB',
						'#FFCE56',
						'#9b59b6',
						'#2ecc71',
						'#f1c40f'
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
	console.log('investments list ctrl debug');
	$http({
		cache: true,
		method: 'GET',
		url: base_api_url + '/getinvestments?clientId=' + client_id,
	}).then(function successCallback(response){
		$scope.data = response.data;
		console.log("INVESTMENTS LIST: " + JSON.stringify(response.data));
	}, function errorCallback(response){
		console.log("Error in callback (2nd)");	
	});
}]);
