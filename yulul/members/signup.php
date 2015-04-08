<?php 
	$title = "Member Signup";
	include_once '../resources/myfunction.inc';	
	
	$currName = $_POST['username'];
	$currPassword = $_POST['password'];
	$currPasswordCheck = $_POST['passwordCheck'];
	$currDay = $_POST['day'];
	$currMonth = $_POST['month'];
	$currYear = $_POST['year'];
	$currSub = $_POST['sub'];
	
	/**
	to check if user type the name correctly and the return the value of $currName.
	*/
	if(checkName($currName))
	{
		$username = $currName;
		$currName = true;
	}
	else
	{
		$currName = false;
	}
		
	/**
	to check if user type the password correctly and the return the value of $currPassword.
	*/
	if(checkPassword($currPassword))
	{
	 	$password = $currPassword;
		$currPassword = true;
	}
	else
	{
		$currPassword = false;

	}
	
	/**
	to count the strength of password and return the value to $passlevel.
	*/
	if($currPassword)
	{
		$passLevel = passStrength($password);
	}
	
	/**
	to check if user type the password check correctly and the return the value of $currPasswordCheck.
	*/	
	if(checkPassword($currPasswordCheck))
	{
	 	$passwordCheck = $currPasswordCheck;
		$currPasswordCheck = true;
	}
	else
	{
		$currPasswordCheck = false;
	}
	
	/**
	to check if user type the same between password and password check correctly and the return the value of $comparePass.
	*/
	if(strcmp($passwordCheck, $password) == 0)
	{
		$comparePass = true;
	}
	else 
	{
		$comparePass = false;
	}
	
	/**
	to check if user type the name, the password, the password check and the comparing of password and password check correctly and the return the value of $submitted.
	*/	
	if($currName && $currPassword && $currSub && $currPasswordCheck && $comparePass)
	{
		$submitted = true;
	}
	else
	{
		$submitted = false;
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
			<?php
				/**
				if $submitted is false and then signup.php displays the form for user to type. 
				However, if $submitted is true, then display some information for user to know they have already successful registered. 
				*/
				if(!$submitted)
				{
			?>
			<form action="" method="post" id="form1">
				<fieldset id="set1">
					<legend><span>Member Signup</span> </legend>
					<div class="required">
						<label class="writing" for="username">
						<span class="info">Username:</span>
						</label>
						<input type="text" id="username" name="username" 
						<?php if($currName) echo "value='$username'"?> />
					</div>
					<div class="required">
						<label class="writing" for="password">
						<span class="info">Password:</span>
						</label>
						<input type="password" id="password" name="password" />
					</div>
					<div class="required">
						<label class="writing" for="passwordCheck">
						<span class="info">Password Check:</span> 
						</label>
						<input type="password" id="passwordCheck" name="passwordCheck" />
					</div>
						<label class="choosing" for="DOB">
						<span class="info">Date of Birth:</span>
						</label>
							<select name="day" id="day"> 
								
							<?php
								echo "<option value=''>None</option>";
								for($i=1; $i<=31; $i++)
								{
									if($currDay == $i)
										echo "<option id='$i' name='$i' value='$i' selected> $i </option>";
									else
										echo "<option id='$i' name='$i' value='$i'> $i </option>";
								}
								echo "<option id='$currDay' name='$currDay' value='$currDay'> $currDay </option>";
							?>
							</select> 
							
							<select name="month" id="month">
								<option value=''>None</option>
								<option id='Jan' name='Jan' value='Jan' <?php if($currMonth == 'Jan') echo "selected";?>> Jan </option>
								<option id='Feb' name='Feb' value='Feb' <?php if($currMonth == 'Feb') echo "selected";?>> Feb </option>
								<option id='Mar' name='Mar' value='Mar' <?php if($currMonth == 'Mar') echo "selected";?>> Mar </option>
								<option id='Apr' name='Apr' value='Apr' <?php if($currMonth == 'Apr') echo "selected";?>> Apr </option>
								<option id='May' name='May' value='May' <?php if($currMonth == 'May') echo "selected";?>> May </option>
								<option id='Jun' name='Jun' value='Jun' <?php if($currMonth == 'Jun') echo "selected";?>> Jun </option>
								<option id='Jul' name='Jul' value='Jul' <?php if($currMonth == 'Jul') echo "selected";?>> Jul </option>
								<option id='Aug' name='Aug' value='Aug' <?php if($currMonth == 'Aug') echo "selected";?>> Aug </option>
								<option id='Sept' name='Sept' value='Sept' <?php if($currMonth == 'Sept') echo "selected";?>> Sept </option>
								<option id='Oct' name='Oct' value='Oct' <?php if($currMonth == 'Oct') echo "selected";?>> Oct </option>
								<option id='Nov' name='Nov' value='Nov' <?php if($currMonth == 'Nov') echo "selected";?>> Nov </option>
								<option id='Dec' name='Dec' value='Dec' <?php if($currMonth == 'Dec') echo "selected";?>> Dec </option>
						   	</select>
							
							<select name="year" id="year">
								
							<?php
								echo "<option value=''>None</option>";
								for($i=2009; $i>=1910; $i--)
								{	
									if($currYear == $i)
										echo "<option id='$i' name='$i' value='$i' selected> $i </option>";
									else
										echo "<option id='$i' name='$i' value='$i' > $i </option>";
								}
									
							?>
							</select><br />
						<button type='submit' id='sub' name='sub' value='submit'>Submit</button>
				</fieldset>
			</form>
			<?php
				}
				else
				{
					echo "<h1>Welcome, $username!<br />Your register was successful.</h1>";
					echo "<p>As a member of us, you can enjoy your new <a href='memberhome.php'>Member Home</a> page.</p>";
					echo "<h1>The password you entered has a strength of $passLevel.</h1>";
				}
			?>
			</div>
		</div>
			
		<div  class="item" id="extras" >
			<div class="actual">
			<?php 
				/**
				to check if user tape those sign up correctly, then if not, give some tips to notes them.
				*/
				if($currSub)
				{
					if(!$currName)
						echo "<h1>Username is invalid.</h1><p>You must tape in username, which is only including digits and letters and different than 'aardvark', 'bandicoot', 'coala', and 'dingo'.</p>";
						
					if(!$currPassword)
						echo "<h1>Password is invalid.</h1><p>You must type in password, which is without any space and more than 6 digits</p>";
						
					if(!$comparePass)
						echo "<h1>Password and Password Check are invalid.</h1><p>You must tape the same password with password check</p>";
				}
				else
					echo "<h1>Welcome to Member Signup.</h1>";
			?>
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