<?php 
	$currEvent = $_GET['event'];
	$currDate = $_GET['date'];
	$title = "Information page for $currDate";
	include_once '../resources/myfunction.inc';	
	
	//get the information from submittion of info, then display what they need to user as a form.
	$extracted = getcurrdata($currEvent);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
				<li class="author"><a href="../resources/authorinfo.php">Author information</a></li>
		</ul>
	</div>
	<div class="line">
		
		<div    class="item" id="sidenav">
			
			<ul>
				<li><a href="../whwhome.php">Home</a></li>
				<li class="current"><a href="select.php">Years</a></li>
				<li><a href="quiz.php">Quiz</a></li>
				<li><a href="../members/signup.php">Member Signup</a></li>
			</ul>
		</div>
		
		
		<div   class="item" id="maincontent" >
			<div class="actual">
			<?php 
				/**
				to display a form for showing the information that user need. 
				*/
				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>type</th>";				
				echo "<td>$extracted[0]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<th>date</th>";				
				echo "<td>$extracted[1]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<th>shortdesc</th>";				
				echo "<td>$extracted[2]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<th>details</th>";				
				echo "<td>$extracted[3]</td>";
				echo "</tr>";
				echo "</table>";
			?>
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