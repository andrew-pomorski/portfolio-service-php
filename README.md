# Portfolio dashboard 

This is Larvel APP for both dashboard frontend and portfolio JSON API

## Auth

The basic auth for this app is the default one, scaffolded by Laravel. 

In routes/web.php there are two route groups: **web** and **portfolio_api**

* Web routes are used for returning views and are protected with basic Laravel Authentication.
Authorization for these requests need to be validated through Laravel.
To Authorize Laravel user, username (email) and password needs to be passed in a POST request to

```
api/auth_web_user?username=<< username >>&pwd=<< password >>
```

* Portfolio routes are used for the JSON API and are protected with Laravel Auth and Middleware.
Laravel Auth makes sure that the client is  logged in, if it's not it redirects user to /error path and returns view informing about what happened.
Middleware checks if the requested clientId is the same as the one associated with current user. If it is, then JSON is returned, otherwise user is redirected to /error path

Ths middleware is located in 

```
app/Http/Middleware/VerifyClientId.php
```

```
public function handle($request, Closure $next){
	$auth_user = Auth::user();
	if (!$user) {
		return redirect('/');
	}
	$internal_user = DB::table('user_verify')->where('auth_user_id', $auth_user->id)->first();
	$client_id = $internal_user->userId();
	if ($client_id != $request->clientId){
		return redirect('/');
	}
	return $next($request);
}
```

It takes the ID of current user and compares it to the UniqueId in "user_verify" table.
If they don't match user is redirected to '/' root path. 

### Auth routes 

To create new account use /register route and then /login to sign in.
**/register route will not be used in production - this will be done through onboarding**


## Tests

There is a whole test suite, along with a template for any other HTTP service tests. It uses mocha and chai for making requests and assertions.
It's available [here](https://github.com/andrew-pomorski/http-api-tests) 


## Requests

There are 4 **API routes** and 4 **web routes**.

### API routes

**User needs to be authenticated through [security service]() in order to make a request.**

**NOTE :** All API URLs are prefixed by /api/. /portfolio_api/ prefix was used in the previous release

#### Current Data

This route returns JSON with current portfolio data 

#### METHOD: GET 
```
/api/current_data?clientId=<< client id >>
```

Example response

```
[  
   {  
      "Country":"UK",
      "Ticker":"GBP",
      "Shares":1,
      "MarkPrice":1,
      "Value":1,
      "Percentage":0.02024171645707213,
      "Name":"Cash in GBP",
      "SecCode":"FX"
   },
   {  
      "Country":"UK",
      "Ticker":"GLTL",
      "Shares":2,
      "MarkPrice":65.91,
      "Value":131.82,
      "Percentage":2.668263063371248,
      "Name":"",
      "SecCode":""
   },
	...
]
``` 
#### Historic Data

This route returns JSON with historic data, and takes optional parameter (days) - the amount of days to show - this parameter defaults to 180.


#### METHOD: GET 
```
/api/historic_data?clientId=<< client id >>&days=<< amount of days >>
```

Example response

```
[  
   {  
      "Country":"UK",
      "Date":"2017-02-20T00:00:00Z",
      "Value":4863.514999999999,
      "Cash":0,
      "Total":4863.514999999999
   },
   {  
      "Country":"UK",
      "Date":"2017-02-21T00:00:00Z",
      "Value":4872.4400000000005,
      "Cash":0,
      "Total":4872.4400000000005
   },
   {  
      "Country":"UK",
      "Date":"2017-02-22T00:00:00Z",
      "Value":4864.555,
      "Cash":0,
      "Total":4864.555
   },
	...
]
```
### Account info

This route returns the current account info (For the currently authorized user). The call to this route is usually made first (before rendering first view). 
The data includes the currency, portfolio level and cash.


#### METHOD: GET 
```
/api/account_info?clientId=<< client id >>
```

Example response: 

```
{
	Cash: 4866.21
	Currency: USD
	Portfolio: 5
}
```

#### Market share

This route returns breakdown of the market share. It can contain one or all of the following keys: 
	- Fixed Income
	- Domestic Markets 
	- Developed Markets
	- Commodities 
	- Other

#### METHOD: GET 

```
/api/market_share?clientId=<< client id >>
```

Example response: 

```
{
	Developed Markets: 56.46831578042299
	Domestic Markets: 9.646735598581904
	Fixed Income: 33.88494862099511
}

```


