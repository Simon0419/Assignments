<?php 
	$title = "Author Information";
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
				<li class="author"><a href="authorinfo.php">Author information</a></li>
		</ul>
	</div>
	<div class="line">
		
		<div    class="item" id="sidenav">
			
			<ul>
				<li class="current"><a href="../whwhome.php">Home</a></li>
				<li><a href="../years/select.php">Years</a></li>
				<li><a href="../years/quiz.php">Quiz</a></li>
				<li><a href="../members/signup.php">Member Signup</a></li>
			</ul>
		</div>
		
		
		<div   class="item" id="maincontent" >
			<div class="actual">
			<ul>
			<li>Full Name: Liang Yulu</li>
			<li>Username: yulul</li>
			<li>ID number: 103242</li>
			<li>Campus: Hobart</li>
			<li>Resourses:
				<ul>
					<li>The file fixedinfo.inc from MyLO</li>
					<li>The lecture notes/self study exercises/domonstrations/tutorial exercises from MyLO</li>
					<li>Search from: <a href="http://www.baidu.com">www.baidu.com</a> & <a href="http://www.google.com.au">www.google.com.au</a></li>
					<li>Function details from: <a href="http://www.w3school.com.cn/php/">http://www.w3school.com.cn/php/</a>(in Chinese)</li></li>
				</ul>
			<li>Problem:
				<ul>
					<li>In quiz.php: it is hard to get value from submittion.(fixed)</li>
					<li>In signup.php: it is unknowed how to check those result and can't get returned value.(fixed)</li>
					<li>In signup.php: it is hard to use preg_match() funtion and regular expression.(fixed)</li>
				</ul>
			</ul>
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