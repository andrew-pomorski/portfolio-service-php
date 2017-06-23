var portfolioApp = angular.module('portfolioService', ['ngRoute']);


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




portfolioApp.controller('mainCtrl',  ['$scope', '$rootScope', function($scope, $rootScope){
	$scope.page = {};
	$scope.page.CV = "Overall Performance";
}]);

portfolioApp.controller('historicalController', ['$scope', '$rootScope', function($scope, $rootScope){
	$scope.page.CV = "Historical Performance";
}]);

portfolioApp.controller('overallCtrl', ['$scope', function($scope){
	$scope.page.CV = "Overall Performance";
}]);


portfolioApp.controller('allocationCtrl', ['$scope', function($scope){
	$scope.page.CV = "Portfolio Allocation";
}]);

portfolioApp.controller('investmentsCtrl', ['$scope', '$http', function($scope, $http){
	$scope.page.CV = "Investments List";
	$scope.data = {};
	$http({
		method: 'GET',
		url: 'http://staging-portfolio.briteinvest.com/getportfolio?clientId=d89248d0-05d4-11e6-8cf6-05443d8c1614',
	}).then(function successCallback(response){
		$scope.data = response.data[0];
		console.log("Error in first callback");
	}, function errorCallback(response){
		console.log("Error in callback (2nd)");	
	});
}]);
