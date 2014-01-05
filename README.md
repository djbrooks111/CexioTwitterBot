CexioTwitterBot
===============

Twitter bot for Cex.io that tweets each hour the current price of GHS/BTC

Requirements
============

PHP (version 5 or better)
cURL support/extension

How to run on a computer:
=========================

1. Download files
2. Generate API key and API secret (https://cex.io/trade/profile)
3. Sign in to http://twitter.com and register an application from the http://dev.twitter.com/apps page.
*NOTE* Remember to never reveal your consumer secrets.
4. Click on My Access Token link from the sidebar and retrieve your own access token.  Now you have the consumer key, consumer secret, access token and access token secret.
5. Once all files are in the same directory, you can run the script my launching Terminal and typing:

```
cd ~/path/to/directory/containing/files
php script.php
```

How to run each hour (cron job):
================================

*NOTE* For this example, the script has been uploaded to a web server.

1. Upload all files to your chosen web server.
2. Create new cron job with the following command:

```
/usr/bin/wget -O - -q "http://website.com/folder/script.php"
```

Sources and additional help
===========================

Two very helpful frameworks were required for this script to work properly.
Those are Cex.io's php api and David Grudl's twitter-php.
They can be found at these locations:

http://github.com/matveyco/cex.io-api-php and http://github.com/dg/twitter-php
