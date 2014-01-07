<?php
// Script to automatically get the current price of Cex.io
// and then tweet that price

/*
The MIT License (MIT)

Copyright (c) 2013 David Brooks

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

// Getting the price from Cex.io
require_once("cexapi.class.php");

$username 	= "username";
$api_key	= "api_key";
$api_secret	= "api_secret";

$api = new cexapi($username, $api_key, $api_secret);
$tick = $api->ticker("GHS/BTC");
$price = $tick["last"];

// Tweeting part of the script
require_once("tmhOAuth.php");

$consumerKey    = "consumerKey";
$consumerSecret = "consumerSecret";
$oAuthToken     = "oAuthToken";
$oAuthSecret    = "oAuthSecret";

$tmhOAuth = new tmhOAuth(array(
	'consumer_key' => $consumerKey,
	'consumer_secret' => $consumerSecret,
	'token' => $oAuthToken,
	'secret' => $oAuthSecret,
	));
	
$response = $tmhOAuth->request('POST', $tmhOAuth->url('1.1/statuses/update'), array(
	'status' => "The price of GHS/BTC on Cex.io is now $price"
	));

if ($response != 200) {
	// Unsuccessful response
	echo "ERROR: $response";
} else {
	echo "ALL GOOD";
}


?>