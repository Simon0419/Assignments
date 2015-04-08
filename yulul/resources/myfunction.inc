<?php

$author = "Liang Yulu";
$lastmod = "13 April 2010";
$filename = $_SERVER['PHP_SELF'];

$stylehref = "../styles/defaultpage.css";
$favhref = "../fav.png";

/**
to give the different of path for different pages.
*/
if($title === "Home"){
	include_once './resources/fixedinfo.inc';}
else{
	include_once '../resources/fixedinfo.inc';}

/**
to get a match of event and different field from fixedinfo.php.
*/
function getListing($multi, $field)
{
	$listing = array( );	
	foreach ($multi as $key=>$value){
		$temp = $value[$field];
		$listing[$key] = $temp;}
	return $listing;
}

/**
to get the different field from a event.
*/
function getcurrdata($curr)
{
	global $events;
	
	$temp = $events[$curr];
	$type = $temp['type'];
	$date = $temp['date'];
	$shortdesc = $temp['shortdesc'];
	$details = $temp['details'];
	return array($type, $date, $shortdesc, $details);
}

/**
to get a random event for quiz.
*/
function getRandEvent($arr)
{
	return array_rand($arr);
}

/**
to get a short description from the event for quiz.
*/
function getQuestion($arr,$ev)
{
	return $arr[$ev];
}

/**
to get a year from the event for quiz.
*/
function getAns($arr, $ev)
{
	return $arr[$ev];
}

/**
to get some details from the evnet for quiz.
*/
function getDetails($arr, $ev)
{
	return $arr[$ev];
}

/**
to get different random years for options.
*/
function getDiffAns($arr, $field)
{
	$listing = array($field);
	while(count($listing) != 4)
	{
		$listing[] = $arr[array_rand($arr)];
		$listing = array_unique($listing);
	}
	
	return $listing;
}

/**
to check if user type the name correctly as we needed.
*/
function checkName($name)
{
	global $members;
	
	if(empty($name))
	{
		return false;
	}
	if(!ctype_alnum($name))
	{
		return false;
	}
	for($i=0; $i<count($members); $i++)
	{
		if($members[$i] == $name)
		{
			return false;
		}
	}
	
	return true;
}

/**
to check if user type the password correctly as we needed.
*/
function checkPassword($pass)
{
	
	if(empty($pass))
	{
		return false;
	}
	
	if(strlen($pass) < 6)
	{
		return false;
	}
	
	if(preg_match('/\s+/',$pass))
	{
		return false;
	}
	
	return true;
}

/**
to get the strength of password.
*/
function passStrength($pass)
{
	$count = 0;
	
	if(strlen($pass) > 5)
		$count++;
		
	if(strlen($pass) > 11)
		$count++;
		
	if(preg_match('/[A-Za-z]{1,}/',$pass))
		$count++;
	
	if(preg_match('/[0-9]{1,}/',$pass))
		$count++;
		
	if(preg_match('/\W+/',$pass))
		$count++;
		
	return $count;
}
?>
