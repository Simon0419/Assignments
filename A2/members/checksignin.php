<?php
$title = "Check Sign In";//title.
$function = "../resources/myfunction.inc";//function.
$datafile = "../resources/quotes.txt";//quotes.txt from mylo side.
include_once($function);//include the function.
$quote = explodequeto($datafile);//get the sentence from quotes.txt.

//use the database from alacritas.
$currdatabase = "yulul";
$db = connecttodatabase($currdatabase) or die("could not connect");

session_start();//use session function.

$uname = $_SESSION['uname'];//get the user name from session.
$pword = $_SESSION['pword'];//get the password from session.

//to check if username and password is correct, then return to home page.
if(checkdb($uname, "Username", $db) === true && checkdb($pword, "Password", $db) === true)
{
	session_start();
	$_SESSION['login'] = true;
	header("refresh:3;url='../whwhome.php'");
}
else
{
	$_SESSION = array();
	session_destroy();
	header("refresh:3;url='../whwhome.php'");
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
				<li><a href="../events/select.php">Events</a></li>
				<?php if(isset($uname) === false)
						{ echo "<li class='current'><a href='signup.php'>Member Signup</a></li>";}?>
			</ul>
		</div>
		
		<div   class="item" id="maincontent" >
			<div class="actual">
			<h2><?php if($_SESSION['login'] === true){echo "Successfully sign in!";}else{echo "Fail sign in!";}?></h2>
			<p>Please wait 3 seconds!</P>
			</div>
		</div>
			
		<div  class="item" id="extras" >
			<div class="actual">
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