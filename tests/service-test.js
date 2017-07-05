'use strict';

var chai = require('chai');
var chaiHttp = require('chai-http');
var should = chai.should();
var expect = chai.expect();

chai.use(chaiHttp);

var config = require('./config');

var staging_url = config.staging_url;
var client_id = config.client_id;

describe('Test the portfolio service HTTP', function(){

	it('should get current portfolio', function(done){
		chai.request(staging_url)
			.get('/getportfolio?clientId=' + client_id)
			.end(function(err, res){
				res.should.have.status(200);
				done();
			})
	});

	it('should get historic data', function(done){
		chai.request(staging_url)
			.get('/gethistorical?clientId=' + client_id)
			.end(function(err, res){
				res.should.have.status(200);
				done();
			})
		
	});
	
	it('should get historic data with specific amount of days', function(done){
		var no_days = Math.floor(Math.random() * (365 - 1 + 1)) + 1;
		chai.request(staging_url)
			.get('/gethistorical?clientId=' + client_id + "&days=" + no_days)
			.end(function(err, res){
				res.should.have.status(200);
				done();
			})
		
	});

	it('should get account info', function(done){
		chai.request(staging_url)
			.get('/getaccinfo?clientId=' + client_id)
			.end(function(err, res){
				res.should.have.status(200);
				done();
			})
	});

	it('should get market share', function(done){
		chai.request(staging_url)
			.get('/getmarketshare?clientId=' + client_id)
			.end(function(err, res){
				res.should.have.status(200);
				done();
			})
	});
	
});

describe('Test the BODY of the response', function(){

	it('Historical body should be a non-empty array', function(done){
		chai.request(staging_url)
			.get('/gethistorical?clientId=' + client_id)
			.end(function(err, res){
				res.text = JSON.parse(res.text);
				res.text.should.be.an('array').that.is.not.empty;
				res.text[0].should.have.property('Country');
				res.text[0].should.have.property('Date');
				res.text[0].should.have.property('Value');
				res.text[0].should.have.property('Cash');
				res.text[0].should.have.property('Total');
				done();
			})
	
	});

	it('Account info should have Cash, Currency and Portfolio property', function(done){
		chai.request(staging_url)
			.get('/getaccinfo?clientId=' + client_id)
			.end(function(err, res){
				res.text = JSON.parse(res.text);
				res.text.should.have.property('Cash');
				res.text.should.have.property('Currency');
				res.text.should.have.property('Portfolio');
				done();
			})
	
	});

	it('Market share should be valid JSON with given properties', function(done){
		chai.request(staging_url)
			.get('/getmarketshare?clientId=' + client_id)
			.end(function(err, res){
				var res_obj = JSON.parse(res.text);
				res_obj.should.have.property('Domestic_Markets');
				res_obj.should.have.property('Developed_Markets');
				res_obj.should.have.property('Fixed_Income');
				done();
			})
	});
	

	it('Current Portfolio should be a valid JSON with given properties', function(done){
		chai.request(staging_url)
			.get('/getportfolio?clientId=' + client_id)
			.end(function(err, res){
				res.text = JSON.parse(res.text);
				res.text.should.be.an('array').that.is.not.empty;
				res.text[0].should.have.property('Country');
				res.text[0].should.have.property('Ticker');
				res.text[0].should.have.property('Shares');
				res.text[0].should.have.property('MarkPrice');
				res.text[0].should.have.property('Value');
				res.text[0].should.have.property('Percentage');
				res.text[0].should.have.property('Name');
				res.text[0].should.have.property('SecCode');
				done();
			})
	});

});


describe('This suite asserts TIME of the request', function(){
	it('Check if the /getportfolio path isn\'t taking more than 1000ms');
	it('Check if the /gethistorical path isn\'t taking more than 1000ms');
	it('Check if the /getaccinfo path isn\'t taking more than 1000ms');
	it('Check if the /getmarketshare path isn\'t taking more than 1000ms');
})


describe('This suite checks if the AUTH is successful', function(){
	it('Checks for 302 redirect status code from the login page');
	it('Checks if the dashboard page is sending 200 status code after redirect');
	it('Checks if the account info gets stored in local storage');
	it('Checks if charts get rendered properly');
});
