# Kaythinks/EazyCurl

This is a PHP Wrapper which makes making API Calls a breeze

There are presently 6 static methods namely;

- getApiResponse(string $url) : Array
	-This method returns a JSON Response for unauthenticated API's.

- getWebContents(string $url) : String
	-This method returns the contents of a web page.

- postApiData(array $data, string $url) : Array
	-This method can be used to post data to an API endpoint 

- postAuthApiData(array $data, string $url, string $token) : Array
	-This method is for accessing authenticated API endpoints by passing data and token variables

- getAuthApi(string $url, string $token) : Array
	-This method is for accessing an authenticated GET endpoint

- postAuthApi(string $url, string $token) : Array
	-This method is for accessing an authenticated POST endpoint

To install this package follow the steps below

-- Run composer require kaythinks/goodthoughts

-- Run composer dump-autoload

-- The library can be used this way for example;

    <?php

	require_once 'vendor/autoload.php';

	use Eazycurl\Eazycurl;

	echo Eazycurl::getApiResponse('https://jsonplaceholder.typicode.com/todos/11');

