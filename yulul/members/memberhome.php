<?php 
	$title = "Member Home";
	include_once '../resources/myfunction.inc';	
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
		
		<div    class="item" id="sidenav">
			
			<ul>
				<li><a href="../whwhome.php">Home</a></li>
				<li><a href="../years/select.php">Years</a></li>
				<li><a href="../years/quiz.php">Quiz</a></li>
				<li class="current"><a href="signup.php">Member Signup</a></li>
			</ul>
		</div>
		
		
		<div   class="item" id="maincontent" >
			<div class="actual">
			<h1>The contents of the Member Home will be available soon.</h1>
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