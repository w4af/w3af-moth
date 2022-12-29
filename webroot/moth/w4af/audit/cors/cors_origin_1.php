<?
/*
Test script sending always the same "Access-Control-Allow-Origin" response 
header value with HTTP 200 response code.
*/
header("Access-Control-Allow-Origin: http://w4af.sourceforge.net");
?>
<html>
	<body>
		HTTP Response code 200 returned.<br>
		HTTP response header <b>Access-Control-Allow-Origin</b> set to "<b>http://w4af.sourceforge.net</b>" 
	</body>
</html>
