# Portfolio dashboard 

This is Larvel APP for both dashboard frontend and portfolio JSON API

## Auth

The basic auth for this app is the default one, scaffolded by Laravel. 

In routes/web.php there are two route groups: **web** and **portfolio_api**

* Web routes are used for returning views and are protected with : **TODO**


* Portfolio routes are used for the JSON API and are protected with Laravel Auth and Middleware.
Laravel Auth makes sure that the client is  logged in, if it's not it redirects user to /error path and returns view informing about what happened.
Middleware checks if the requested clientId is the same as the one associated with current user. If it is, then JSON is returned, otherwise user is redirected to /error path

Ths middleware is located in 

```
app/Http/Middleware/VerifyClientId.php
```

### Auth routes 

To create new account use /register route and then /login to sign in.
**/register route will not be used in production - this will be done through onboarding**


## Tests

There is a whole test suite, along with a template for any other HTTP service tests. It uses mocha and chai for making requests and assertions.
It's available [here](https://github.com/andrew-pomorski/http-api-tests) 

