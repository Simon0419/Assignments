<?php
$author = "Liang Yulu"; 
$username = "yulul";
$idnumber = "103242";
$campus = "Hobart";
$lastmod = date('j M, Y',getlastmod());
$fileNpath = $_SERVER['PHP_SELF'];

/**
to seperate the quotes from txt then return a sentence randomly.
*/
function explodequeto($source)
{
	$all  = file_get_contents($source);
	$all = explode("\n",$all);
	return $all[rand(0,count($all)-1)];
}

/**
to connect the database
*/
function connecttodatabase($whichone)
{
	$link = new mysqli('localhost','yulul','103242', $whichone);
	if ($link->connect_error) {
		echo "connection failed " . $link->connect_error . "<br />\n";
		$link = false;
	}
	return $link;
}

/**
to display the value from the result of query (use for get the years)
*/
function listofresults($resultobject, $numresults)
{
	$theoutput = array();
	if ($numresults > 0) {
		$currow = $resultobject->fetch_assoc();
		$resultobject->data_seek(0);
		for ($i = 0; $i < $numresults; $i++) {
			$currow = $resultobject->fetch_assoc();
			foreach ($currow as $key => $value) {
				$theoutput[] = $value;
			}
		}
	}
	return $theoutput;
}

/**
use to display a table as necessary
*/
function tableofresults($resultobject, $numresults)
{
	$theoutput = "";
	if ($numresults > 0) {
		$currow = $resultobject->fetch_assoc();
		$theoutput .="<table>\n";
		$theoutput .= "<tr>\n";
		foreach ($currow as $key => $value) {
			$theoutput .= "<th>$key</th>";
		}
		$theoutput .= "</tr>\n";
		$resultobject->data_seek(0); // back to top
		for ($i = 0; $i < $numresults; $i++) 
		{
			$currow = $resultobject->fetch_assoc();
			$theoutput .= "<tr>\n";
			foreach ($currow as $key => $value1) {
				if($key === "alltags")
				{
					$theoutput .= "<td>";
					$expArr = explode("\n",$value1);
					foreach($expArr as $value2){
					$theoutput .= "<a href='infobytag.php?alltags=$value2'>$value2</a><br />";}
					$theoutput .= "</td>";
				}
				elseif($key === "Eid"){
					$theoutput .= "<td>";
					$theoutput .= "<a href='tagadate.php?Eid=$value1'>Tag this date</a><br />";
					$theoutput .= "</td>";
				}
				else{
					$theoutput .= "<td>$value1</td>";
				}

			}
			$theoutput .= "</tr>\n";
		}
		$theoutput .= "</table>";
	}
	
	
	return $theoutput;
}

/**
to get the clode tags.
*/
function listofcloud($resultobject, $numresults)
{
	$max = 0;
	$min = 1;
	
	for ($i = 0; $i < $numresults; $i++) 
	{
		$currow = $resultobject->fetch_assoc();
		foreach ($currow as $key => $value) 
		{
			if($key === 'counttag')
			{
				if($value > $max)
				{
					$max = $value;
				}
				
				if($value < $min)
				{
					$min = $value;
				}
			}
		}
	}
	
	$bin = ($max + $min) / 3;
	
	$theoutput = '';
	$resultobject->data_seek(0);
	for ($i = 0; $i < $numresults; $i++)
	{
		$currow = $resultobject->fetch_assoc();
		foreach ($currow as $key => $value) 
		{
			if($key === 'tagname')
			{
				$currname = $value;
			}
			
			if($key === 'counttag')
			{
				if($value<$bin){
					$theoutput .= "<span class=cl1><a href='infobytag.php?alltags=$currname'>$currname($value)</a></span><br />";}
				elseif($value<$bin*2){
					$theoutput .= "<span class=cl2><a href='infobytag.php?alltags=$currname'>$currname($value)</a></span><br />";}
				else{
					$theoutput .= "<span class=cl3><a href='infobytag.php?alltags=$currname'>$currname($value)</a></span><br />";}
			}
		}
	}
	return $theoutput;
}

/**
to check if the information is exist in database.
*/
function checkdb($str, $cname, $db)
{
	$query = "select $cname from members where $cname = '$str'";
	$result = $db->query($query);
	if($result->num_rows > 0){
		$result->free();
		return true;
	}
	else{
		$result->free();
		return  false;
	}
}
?>