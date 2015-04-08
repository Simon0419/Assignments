<?php
$title = "Author Information";
$function = "../resources/myfunction.inc";
$datafile = "../resources/quotes.txt";
include_once($function);
$quote = explodequeto($datafile);

session_start();
	
if(isset($_POST['register']) === true)
{
	header("location: ../members/signup.php");
}

if(isset($_POST['login']) === true)
{

	$_SESSION['uname'] = $_POST['uname'];
	$_SESSION['pword'] = MD5($_POST['pword']);
	header("location: ../members/checksignin.php");
}

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
				<li class="author"><a href="authorinfo.php">Author information</a></li>
		</ul>
	</div>
	
	<div class="line">
		
		<div class="item" id="sidenav">
			<ul>
				<li class="current"><a href="../whwhome.php">Home</a></li>
				<li><a href="../events/select.php">Events</a></li>
				<?php if(!isset($_SESSION['login'])){?><li><a href="../members/signup.php">Member Signup</a></li><?php } ?>
			</ul>
		</div>
		
		<div   class="item" id="maincontent" >
			<div class="actual">
			<ul>
			<li>Full name: <?php echo $author;?></li>
			<li>Username: <?php echo $username;?></li>
			<li>ID number: <?php echo $idnumber;?></li>
			<li>Campus: <?php echo $campus;?></li>
			<li>A list of resources you used in preparing this assignment.
			<ul>
			<li>CSS file, table display function, connect database function, and explode quotes function from tutorial side.</li>
			<li>the seperate table code is according to "http://zhidao.baidu.com/question/84451639.html?fr=ala1"</li>
			<li>tutorial and lecture notes</li>
			<li>http://www.w3school.com.cn/php/</li>
			</ul>
			</li>
			<li>A list of known problems that you have identified when testing your implementation and have not been able to fix.
			<ul>
			<li>test query for all necessary is hard.</li>
			<li>set the sperate page for table</li>
			<li>test valid information submit by user</li>
			<li>create a table under my name</li>
			<li>insert username and password to my table</li>
			<li>use session function</li>
			<li>insert tags to KXT209WHW</li>
			</ul>
			</li>
			<li>Simple Improvement
            <ul><li>the advantages and disadvantages of this simple improvement</li>

<p>One of the advantage of this proposal is that, there will not be a need for the technical personal to be involved since users can input tags on their own. This will make the work of the technical personal easier and they can focus on other things.

Another good thing of this proposal is that user can be freer to type their own tags. Also for some events, they are hard to define which tags they belong to, and it can be bored user or confused them. However, if user can tag any date them wanted, that also will be confused other user and to some evil people, they will use this improvement to destroy our original database which is hard to manage by our programmers. That also will bring other security problems, which are bugs.

To solve the security problem, we may need to implement security levels for tags input to each user, which will be more programming for the programmers. 

There may be duplicate tags that were input by different user. This will also cause confusion and complication to the system.</p>


<li>any additional programming that would be required </li>

<p>1, Programmer needs to create a form for text field.<br />
2, Using some function to check if user type in valid information.<br />
3, Using another function to check if those information is exist in database.<br />
4, insert this information into database.<br />
5, show to others users.</p>

<li>any alternative methods you can think of that would give members some flexibility in the choice of tags without the disadvantages you have identified.</li>

<p>We can separate member to different levels, high, low and not. For high level members, they are have more authority to change tags, such as create tag name and tag a date, because high level people is credible and can be trust by programmer. For low level member, they are normal people and wanted to improve our program, so they want to join us. However, they are hard to trust by programmer so they can only tag a date and give some improve information to team. The lowest level is user, who are not be to our members, so they only can read the tags, and can’t to any changes.</p>

            </ul></li>
			</ul>
			</div>
		</div>
			
		<div  class="item" id="extras" >
			<div class="actual">
				<?php if(!isset($_SESSION['login'])){
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