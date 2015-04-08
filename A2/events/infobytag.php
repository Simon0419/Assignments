<?php
$title = "Information By Tag";//title.
$function = "../resources/myfunction.inc";//function.
$datafile = "../resources/quotes.txt";//quotes.txt from mylo side.
include_once($function); //include the function.
$quote = explodequeto($datafile);//get the sentence from quotes.txt.

//get the value of tags then save it.
$alltags = $_GET['alltags'];
$currURI = "?alltags=$alltags";

//use the database from alacritas.
$currdatabase = "KXT209WHW";
$db = connecttodatabase($currdatabase) or die("could not connect");

//query for all detail of a event depended on tags.
$query = "select year, shortdesc, details from events left join (select Eid, event, tag, Tid, tagname from events, links, tags where Eid = event and Tid = tag) as new using(Eid) where year is not null";

if(!empty($alltags))
{
	$query = $query." and tagname like '%$alltags%' group by Eid";
}
else
{
	$query = $query." group by Eid";
}

//use for seperate page from a large table(10 lines per page)
if( isset($_GET['page']) ){
   $page = intval( $_GET['page'] );
}
else{
   $page = 1;
} 

$page_size = 10; 
 
$result = $db->query($query);
$amount = $result->num_rows;
$a = $amount;

if( $amount ){
   if( $amount < $page_size ){ $page_count = 1; }               
   if( $amount % $page_size ){                                  
       $page_count = (int)($amount / $page_size) + 1;           
   }else{
       $page_count = $amount / $page_size;                      
   }
}
else{
   $page_count = 0;
}

$page_string = '';
if( $page == 1 ){
   $page_string .= 'Home|Prev|';
}
else{
   $page_string .= '<a href='.$currURI.'&page=1>Home</a>|<a href='.$currURI.'&page='.($page-1).'>Prev</a>|';
} 

if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= 'Next|End';
}
else{
   $page_string .= '<a href='.$currURI.'&page='.($page+1).'>Next</a>|<a href='.$currURI.'&page='.$page_count.'>End</a>';
}


   $query .= " limit ". ($page-1)*$page_size .", $page_size";

//get result depanded on query then display as a table.
$result = $db->query($query);
$numresults = $result->num_rows;
$outputtable = tableofresults($result, $numresults);
$result->free();

//use for tags clode.
$cquery = "select tagname, count(tag) as counttag from tags, links where tag = Tid group by tagname order by counttag ";
$cresult = $db->query($cquery);
$cnumresults = $cresult->num_rows;
$clode = listofcloud($cresult, $cnumresults);

$cresult ->free();

$db->close();

session_start();//use session function.
	
//check if register botton is on, return true then process to signup page.
if(isset($_POST['register']) === true)
{
	header("location: ../members/signup.php");
}

//check if login botton is on, return true then save the user name and password and process to checksignin page.
if(isset($_POST['login']) === true)
{

	$_SESSION['uname'] = $_POST['uname'];
	$_SESSION['pword'] = MD5($_POST['pword']);
	header("location: ../members/checksignin.php");
}

//check if logout botton is on, return true then destroy all information in session.
if(isset($_POST['logout']) === true)
{
	$_SESSION = array();
	session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="../styles/defaultpage.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

	<div   id="header">
		<div class="actual"><?php echo $title;?>
		</div>
		<ul id="utilities">
				<li class="skip"><a href="#maincontent">Skip to content</a></li>
				<li class="author"><a href="../resources/authorinfo.php">Author information</a></li>
		</ul>
	</div>
	
	<div class="line">
		
		<div class="item" id="sidenav">
			<ul>
				<li><a href="../whwhome.php">Home</a></li>
				<li class="current"><a href="select.php">Events</a></li>
				<?php if(!isset($_SESSION['login'])){?><li><a href="../members/signup.php">Member Signup</a></li><?php } ?>
			</ul>
		</div>
		
		<div   class="item" id="maincontent" >
			<div class="actual">
            
            <?php
            if ($outputtable !== "") {
                echo $outputtable;
            } else {
                echo "<p> result set was empty</p>\n";
            }	
            echo "<p>$page_string</p>";
            ?>
			</div>
		</div>
			
		<div  class="item" id="extras" >
			<div class="actual">
				<?php 
				//check if user login or not, true for sign in form and false for logout.
				if(!isset($_SESSION['login'])){
				echo "<form method='post' action='$fileNpath'>
				<fieldset>
				<legend>Sign in</legend>
				<div>
				<label for='uname'>Username:</label>
				<input type='text' id='uname' name='uname' />
				</div>
				<div>
				<label for='pword'>password:</label>
				<input type='password' id='pword' name='pword' />
				</div>
				<div>
				<input type='submit' name='register' value='Register' />
				<input type='submit' name='login' value='Login' />
				</div>
				</fieldset>
				</form>";
				}
				else
				{
					echo "<form method='post' action='$fileNpath'>
					<fieldset>
					<legend>Hi ".$_SESSION['uname']."</legend>
					<input type='submit' name='logout' value='logout' />
					</fieldset>
					</form>";
				}
				?>
				
				<div class="cloud">
				<?php
					
					echo $clode;
					
				?>
				</div>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="actual">
			<?php echo "<h3>$quote</h3>";?>
			<ul>
				<li>Author Name: <?php echo $author;?></li>
				<li>Modified Date: <?php echo $lastmod;?></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>