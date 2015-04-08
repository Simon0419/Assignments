<?php 
	$title = "Home";
	
	include_once './resources/myfunction.inc';
	
	$stylehref = "styles/defaultpage.css";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link href="<?php echo $stylehref;?>" rel="stylesheet" type="text/css" />
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
				<li><a href="years/select.php">Years</a></li>
				<li><a href="years/quiz.php">Quiz</a></li>
				<li><a href="members/signup.php">Member Signup</a></li>
			</ul>
		</div>
		
		<div   class="item" id="maincontent" >
			<div class="actual">
			<h1>"What happened When"(WHW)</h1>
			<p>In this application, you can know some detail about some famous events. <br />As you go to <a href="years/select.php">Year</a>, you can get some ideas about the name, the type of event, the date, the short description and the detail of the event. <br /> After you go to <a href="years/quiz.php">Quiz</a>, you can get a question about one of the event randomly, and if you can get the answer, we will have a good suprise to you.<br /> In <a href="members/signup.php">Member Signup</a>, you can register as a member of us, and make sure you sign up in a right way. After this you login as our member, you can enjoy your happy hour with other member in applicaiton.</p>
			<h1>Welcome to WHW home page</h1>
			</div>
		</div>
			
		<div  class="item" id="extras" >
			<div class="actual">
			<?php echo $quotes[rand(0,11)];?>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="actual">
			<ul>
				<li>Author Name: <?php echo $author;?></li>
				<li>Modified Date: <?php echo $lastmod;?></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>