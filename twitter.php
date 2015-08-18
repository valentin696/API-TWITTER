<html>
<head>
<title>API Twitter</title>
<link rel='stylesheet' href='estilo.css'>
</head>
<center>
<body>
<form class="contacto" name="form" method="GET" action="">
<center>
<br>
<div><h1>API Twitter</h1><div>
<br>
<table>
</table>
</center>
<table>
<tr>
	<td><input placeholder="Usuario" required="required" title="No Debe Quedar Vacio!" size="150" type="text" name="usu"/></td>
</tr>
<tr>
	<td><input placeholder="Access Token" required="required" title="No Debe Quedar Vacio!" size="150" type="text" name="at"/></td>
</tr>
<tr>
	<td><input placeholder="Access Token Secret" required="required" title="No Debe Quedar Vacio!" size="150" type="text" name="ats"/></td>
</tr>
<tr>
	<td><input placeholder="Consumer Key" required="required" title="No Debe Quedar Vacio!" size="150" type="text" name="ck"/></td>
</tr>
<tr>
	<td><input placeholder="Consumer Secret" required="required" title="No Debe Quedar Vacio!" size="150" type="text" name="cs"/></td>
</tr>
<tr>
	<td><input placeholder="Numero de Tweets" required="required" title="No Debe Quedar Vacio!" size="150" type="number" name="nt"/></td>
</tr>
</table>
<br>
<input type="submit" value="Siguiente"/>
</form>
</body>
</center>
</font>
</html>
<html>

<?php

@$usu=$_GET['usu'];
@$at=$_GET['at'];
@$ats=$_GET['ats'];
@$ck=$_GET['ck'];
@$cs=$_GET['cs'];
@$nt=$_GET['nt'];
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "$at",
    'oauth_access_token_secret' => "$ats",
    'consumer_key' => "$ck",
    'consumer_secret' => "$cs"
        ); 
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "$usu";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = "$nt";}
$getfield = "?screen_name=$usu&count=$nt";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "".$string["errors"][0]["message"]."||| Good Performance";exit();}
foreach($string as $items)
    			{
		
					echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        			echo "Tweet: ". $items['text']."<br />";
        			echo "Tweeted by: ". $items['user']['name']."<br />";
        			echo "Screen name: ". $items['user']['screen_name']."<br />";
        			echo "Followers: ". $items['user']['followers_count']."<br />";
        			echo "Friends: ". $items['user']['friends_count']."<br />";
        			echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
		}
?>