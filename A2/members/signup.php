<?php
$title = "Sign Up";//title.
$function = "../resources/myfunction.inc";//function.
$datafile = "../resources/quotes.txt";//quotes.txt from mylo side.
include_once($function);//include the function.
$quote = explodequeto($datafile);//get the sentence from quotes.txt.

//use the database from alacritas.
$currdatabase = "yulul";
$db = connecttodatabase($currdatabase) or die("could not connect");

$errors = array();//to collect error messages.

$validname = false; //name valid or not.
$validpass = false;//password valid or not.
$validpasscheck = false;//check password valid or not again.
$validdate = true;//date valid or not.
$validspam = false;//antispam valid or not.

if (isset($_POST['submit']) === false) {
	$submitted = false;
} else {
	$submitted = true;
	
	$uname = trim($_POST['uname']); //get the name from submit form.
	$pword = trim($_POST['pword']);//get the password from submit form.
	$passcheck = trim($_POST['passcheck']);//get the password check from submit form.
	$day = $_POST['day'];//get the day from submit form.
	$month = $_POST['month'];//get the month from submit form.
	$year = $_POST['year'];//get the year from submit form.
	$date = "NULL";//date format is null
	$spam = trim($_POST['spam']);//get the antispam from submit form.

	//to check if the name is correct as necessary or not, then save the massage in errors[].
	if (strlen($uname) <= 0) {
		$errors['uname entry'] = '<span class="errormsg">ERROR - this should have a value!</span>';
	} 
	elseif(!ctype_alnum($uname)){
		$errors['uname entry'] = '<span class="errormsg">ERROR - this should entry number or digits!</span>';
	}
	elseif(checkdb($uname, "Username", $db)){
		$errors['uname entry'] = '<span class="errormsg">ERROR - this should entry another name</span>';			
	}
	else{
		$validname = true;
		$errors['uname entry'] = '<span class="info">Username is valid</span>';
	}

	//to check if the password is correct as necessary or not, then save the massage in errors[].
	if (strlen($pword) < 6) {
		$errors['pass entry'] = '<span class="errormsg">ERROR - this should have 6 characters!</span>';
	}
	elseif (!preg_match('/[\s]/',$pword) === 0) {
		$errors['pass entry'] = '<span class="errormsg">ERROR - this should not have any space!</span>';
	} else {
		$validpass = true;
		$errors['pass entry'] = '<span class="info">Password is valid</span>';
	}

	//to check if the password check is correct as necessary or not, then save the massage in errors[].
	if (strlen($passcheck) <= 0) {
		$errors['check password'] = '<span class="errormsg">ERROR - this should have a value!</span>';
	}
	elseif ($pword !== $passcheck) {
		$errors['check password'] = '<span class="errormsg">ERROR - this should be the same with Password!</span>';
	} else {
		$errors['check password'] = '<span class="info">Password check is valid</span>';
		$validpasscheck = true;
	}
	
	//to check if the date is correct or not, then save the massage in errors[].
	if(!empty($month) || !empty($day) || !empty($year)){
	if (!checkdate($month, $day, $year)) {
		$errors['date'] = '<span class="errormsg">ERROR  - you must select correct data!</span>';
		$validdate = false;
	} 
	else
	{
		$date = "'$year-$month-$day'";
	}
	}
	
	//to check if the antispam is correct or not, then save the massage in errors[].
	if($spam !== $_COOKIE["test"]){
		$errors['spam'] = '<span class="errormsg">ERROR  - you must type antispam correctly!</span>';
	} else {
		$validspam = true;
		$errors['spam'] = '<span class="info">Antispam is valid</span>';
	}
}

session_start();//use session function.

//if all information from submitted form is correct then save it into database and process to checksignin page to login.
if($submitted === true && $validname === true && $validpass === true && $validpasscheck === true && $validdate === true && $validspam === true )
{
	$query = "INSERT INTO `members` (`Username`, `Password`, `DOB`, `Tags`) VALUES ('$uname', MD5('$pword'), $date, 0);";
	$result = $db->query($query);
	$db->close();
	
	
	$_SESSION['uname'] = $uname;
	$_SESSION['pword'] = MD5($pword);
	header("location: checksignin.php");
}

//check if register botton is on, return true then process to signup page.	
if(isset($_POST['register']) === true)
{
	header("location: signup.php");
}

//check if login botton is on, return true then save the user name and password and process to checksignin page.
if(isset($_POST['login']) === true)
{

	$_SESSION['uname'] = $_POST['uname'];
	$_SESSION['pword'] = MD5($_POST['pword']);
	header("location: checksignin.php");
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
				<li><a href="../events/select.php">Events</a></li>
				<li class="current"><a href="signup.php">Member Signup</a></li>
			</ul>
		</div>
		
		<div   class="item" id="maincontent" >
			<div class="actual">
			<?php 
				//if ($submitted === false) {
			?>
		    <form action="<?php echo $fileNpath; ?>" method="post" id="form1">
		      <fieldset id="set1">
		      <legend><span>Register</span> </legend>
		      <div class="required">
		      	<label  class="writing" for="uname">Username:
		        <?php 
		        //to display the message from errors[].
					if($submitted === false){
						echo "<span class='info'>Only letters or digits</span>";
					}
					else
					{
						echo $errors['uname entry'];
					}
				?>
                </label>
		      	<input type="text" id="name" name="uname" <?php if($validname){echo "value = $uname";}?> />
		        </div>
		        
		        <div class="required">
		      	<label  class="writing" for="pword">Password:
                <?php 
					//to display the message from errors[].
					if($submitted === false){
						echo "<span class='info'>At least 6 characters and not any space</span>";
					}
					else{
						echo $errors['pass entry'];
					}
					
				?> 
		        </label>
		      	<input type="password" id="pass" name="pword" /> 
		        </div>
		        
		        <div class="required">
		        <label class="writing"  for="passcheck">Password Check:
                <?php 
                //to display the message from errors[].
					if($submitted === false){
						echo "<span class='info'>Entry the password again</span>";
					}
					else{
						echo $errors['check password'];
					}
				?>
		        </label>
		      	<input type="password" id="passcheck" name="passcheck" /> 
		        </div>
		      </fieldset>
		      
		      <fieldset id="set2">
		      <legend><span>Date of Birth</span> </legend>
              
              <label for="dob">
              <?php 
              //to display the message from errors[].
			 		if($validdate === true){
						echo "<span class='info'>Entry Your Date of Birth</span>";
					}
					else{
						echo $errors['date'];
					}
				?>
                </label>
                
		      <label  class="writing" for="day">Day</label>
		       <select name="day" id="day">
            	<option name="day" value="0">none</option>
           		 <?php 
           		 //to display day
           		 for($i=1; $i<=31; $i++){
				if($validdate === true && $i == $day){
            		echo "<option name='day' value='$i' selected>$i</option>";}
				else
				{
					echo "<option name='day' value='$i'>$i</option>";
				}
				}?>
            </select>
            
            <label  class="writing" for="month">Month</label>
		       <select name="month" id="month">
            	<option name="month" value="0">none</option>
           		 <?php 
           		 //to display month
				 $monthArr = array(Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec);				
				 for($i=0; $i<12;$i++){
					 $num = $i+1;
					 if($validdate === true && $num == $month){
            	echo "<option name='month' value='$num' selected>".$monthArr[$i]."</option>";}
				else
				{
					echo "<option name='month' value='$num'>".$monthArr[$i]."</option>";
				}
				}?>
            </select>
            
            <label  class="writing" for="year">Year</label>
		       <select name="year" id="year">
            	<option name="year" value="0">none</option>
           		 <?php 
           		 //to display year
           		 for($i=1910; $i<=2009; $i++){
					 if($validdate === true && $i == $year){
            	echo "<option name='year' value='$i' selected>$i</option>";}
				else
				{
					echo "<option name='year' value='$i'>$i</option>";
				}
				}?>
            </select>
            </fieldset>
            
            <fieldset id="set4">
            <legend><span>CAPTCHA</span> </legend>
            <div class="required">
		      	<label  class="writing" for="spam">Antispam:
                <?php 
                //to display the message from errors[].
					if($submitted === false){
						echo "<span class='info'>Entry the Antispam correctly</span>";
					}
					else{
						echo $errors['spam'];
					}
					
				?>
		        <img src="../outside/spam.php" alt="spam" \></label>
		      	<input type="text" id="spam" name="spam" />
		        </div>
			</fieldset>
            
		      <fieldset id="set4">
		      	<input type="submit" name="submit" id="submit" value="Submit" />
		      	<input type="reset" name="reset" id="reset" value="Reset" />
		      </fieldset>
		      </form>
              <?php
				//}
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