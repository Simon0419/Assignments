<?php
$title = "Home Page"; //title.
$function = "./resources/myfunction.inc"; //function.
$datafile = "./resources/quotes.txt"; //quotes.txt from mylo side.
include_once($function); //include the function.
$quote = explodequeto($datafile); //get the sentence from quotes.txt.

session_start(); //use session function.

//check if register botton is on, return true then process to signup page.
if(isset($_POST['register']) === true)
{
	header("location: members/signup.php");
}

//check if login botton is on, return true then save the user name and password and process to checksignin page.
if(isset($_POST['login']) === true)
{

	$_SESSION['uname'] = $_POST['uname'];
	$_SESSION['pword'] = MD5($_POST['pword']);
	header("location: members/checksignin.php");
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
<title>Home Page</title>
<link href="styles/defaultpage.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

	<div   id="header">
		<div class="actual"><?php echo $title;?>
		</div>
		<ul id="utilities">
				<li class="skip"><a href="#maincontent">Skip to content</a></li>
				<li class="author"><a href="resources/authorinfo.php">Author information</a></li>
		</ul>
	</div>
	
	<div class="line">
		
		<div class="item" id="sidenav">
			<ul>
				<li class="current"><a href="whwhome.php">Home</a></li>
				<li><a href="events/select.php">Events</a></li>
				<?php if(!isset($_SESSION['login'])){?><li><a href="members/signup.php">Member Signup</a></li><?php } ?>
			</ul>
		</div>
		
		<div   class="item" id="maincontent" >
			<div class="actual">
            <p>Home page: a brief introduction to this applicaion<br /><br />
            Event page: user can search for a exact or fuzzy event depended some describes and then using some links, users can get more information about that event or other similar event(tags); after member login, they can add more tags to that event as improve our database.<br /><br />
			member page: user can sign up as our member following our sign up form, then can improve our event after sign up.</p>
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