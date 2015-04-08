<?php
$title = "Tag a Date";//title.
$function = "../resources/myfunction.inc";//function.
$datafile = "../resources/quotes.txt";//quotes.txt from mylo side.
include_once($function);//include the function.
$quote = explodequeto($datafile);//get the sentence from quotes.txt.

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

$eid = $_GET['Eid'];// get the value from URL.
$tags = $_GET['tags']; //get the value from checkbox after submit.

//use the database from alacritas.
$currdatabase = "KXT209WHW";
$db = connecttodatabase($currdatabase) or die("could not connect");
$db2 = connecttodatabase("yulul") or die("could not connect");

//use the query to find the event member wanted to change it.
$query = "select year, shortdesc, details from events left join (select Eid, event, tag, Tid, tagname from events, links, tags where Eid = event and Tid = tag) as new using(Eid) where year is not null and Eid = '$eid' group by Eid";

//use the query to find all the tagname for option.
$query1 = "select tagname from tags order by tagname";

//to check if submit is successful.
//then check if the tagname member choose has been taken by others. if not, then insert the tag into that event.
if (isset($_GET['submit']) === false) {
	$submitted = false;
}
else{
	$submitted = true;
	$querycheck = "select * from links, tags where Tid = tag and event = $eid  and tagname like '%$tags%' group by event";

	
	$resultcheck = $db->query($querycheck);
	$numresultscheck = $resultcheck->num_rows;
	if($numresultscheck > 0){
		$validtag = false;}
                else{
                    $validtag = true;
                $findtagid = "select Tid from tags where tagname = '$tags'";
        $tidresult = $db->query($findtagid);
        $curtid = $tidresult->fetch_assoc();
        $tid = $curtid['Tid'];

        $inquery = "INSERT INTO links (event, tag) values ($eid, $tid)";
        $inresult = $db->query($inquery);
        
        $upquery = "update members set tags=tags+1";
        $inresult = $db2 -> query($upquery);}
        
        
	header("refresh:2; url='../whwhome.php'");
	}

//to get the name of all tags.
$checkbox = $db->query($query1);
$numcheckbox = $checkbox->num_rows;

$result = $db->query($query);
$numresults = $result->num_rows;

$outputtable = tableofresults($result, $numresults); //to display the event.
$result->free();
$db->close();
$db2->close();
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
			if(!$submitted){ ?>
            
            <?php
            if ($outputtable !== "") {
                echo $outputtable;
            } else {
                echo "<p> result set was empty</p>\n";
            }	
            echo "<p>$page_string</p>";
            ?>
            
            <form action="<?php $fileNpath;?>" method="get">
            <fieldset>
            <table>
            <tr><th>Tag a Date</th><th>Tag a Date</th><th>Tag a Date</th></tr>
            <?php 
            //to make all option look good.
			$j = 1;
			for ($i = 0; $i < $numcheckbox; $i++) {
				$curcheckbox = $checkbox->fetch_assoc();
				foreach($curcheckbox as $value){
					if($j%3 === 1){
						echo "<tr><td><input type='radio' id='$value' name='tags' value='$value' />
							<lable for='$value'>$value</label></td>";
					}
					elseif($j%3 === 2){
						echo"<td><input type='radio' id='$value' name='tags' value='$value' />
							<lable for='$value'>$value</label></td>";
					}
					else{
						echo"<td><input type='radio' id='$value' name='tags' value='$value' />
							<lable for='$value'>$value</label></td></tr>";
					}
					$j++;
				}
			}
				?>
                </table>
                <input type="hidden" name="Eid" value="<?php echo "$eid";?>" />
                <input type="submit" name="submit" value="Submit" />
                </fieldset>
            </form><?php }else{ if(!$validtag){ ?>
            <h1>Fail</h1><h2>-The tag you choiced have alreadly exist!</h2><P>Please wait 2 seconds!</p>
            <?php }else{ ?>
            <h1>Great</h1><h2>-The tag you choiced is inserted now!</h2><P>Please wait 2 seconds!</p>
            <?php }} ?>
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