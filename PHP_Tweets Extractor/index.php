<?php
    require_once( 'class.textExtract.php' );
    
	$mysql_server_name="localhost"; 
    $mysql_username="root"; 
    $mysql_password="3173614"; 
    $mysql_database="kxt471"; 

    $conn=mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
 	mysql_query("set names utf8");
	$db_selected = mysql_select_db($mysql_database,$conn);
	
	//$iTextExtractor = new textExtract;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : RedAllOver  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120604

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Information Extraction</title>
<link href="http://fonts.googleapis.com/css?family=Abel|Arvo" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
		</div>
	</div>
	<!-- end #header -->
	
	<div id="page">
		<div id="content">
			<div class="post">
				<h2 class="title"><a href="#">
				<?php
					if(isset($_GET['tweet'])) {
						$id = $_GET['tweet'];
						echo "Tweet ".$id;
					}
					else echo "Selected Tweet";
				?>
				</a></h2>
				<hr />
				<div class="entry">
				<p>
				<?php
					$tweet='';
					
					if(isset($_GET['tweet'])) {
						$id = $_GET['tweet'];
						$query_tweet = "SELECT `Tweets` FROM `tweets` WHERE ID=$id";
						$result_tweet=mysql_query($query_tweet, $conn);
						$row_tweet=mysql_fetch_row($result_tweet);
						$tweet = $row_tweet[0];
						
						//preg_match_all('/(http|https|ftp|file){1}(:\/\/)?([\da-z-\.]+)\.([a-z]{2,6})([\/\w \.-?&%-=]*)*\/?/',$tweet,$url);
                        preg_match_all('/(http|https|ftp|file|pic){1}(:\/\/)?[\S]+/',$tweet,$url);
                        //preg_match_all('/(http|https|ftp|file){1}(:\/\/)?/',$tweet,$url);
                        $size = sizeof($url[0]);
                        $newTweet = $tweet;
						for($i=0;$i<$size;$i++){
                            //echo substr( $url[0][$i], 0, 3 );
                            //var_dump($urlStr);
                            $oURL = $url[0][$i];
                            if(strtoupper(substr( $url[0][$i], 0, 3 )) == "PIC")  $url[0][$i] = "http://".$url[0][$i];
                            $urlStr = $url[0][$i];
                            //echo $urlStr;
                            $reURL = "<a href='$urlStr'>$urlStr</a>";
                            $newTweet = str_replace($oURL,$reURL,$newTweet);
						}
                        echo $newTweet;
					}
				?>
				</p>
					
				</div>
			</div>

            <?php for($i=0;$i<$size;$i++){ ?>
                <div class="post">
                    <h3 class="title"><a href="#">
                    <?php
                            if($tweet) 
                            {
                                //unset($iTextExtractor);//$iTextExtractor = array();
								//unset($text);
								//unset($title);
                                
                                $urlStr = $url[0][$i];
                                //echo $urlStr;
                                $iTextExtractor = new textExtract($urlStr);
                                //$iTextExtractor->url = $urlStr;
                                //echo $iTextExtractor->url;
                                //var_dump($iTextExtractor);
                                $text = $iTextExtractor->getPlainText();
                                //var_dump($text);
                                $title = $iTextExtractor->title;
                                if( $iTextExtractor->isGB ) $text = iconv( 'GBK', 'UTF-8//IGNORE', $text );
                                
                                //var_dump($title);
                                echo $title;
                                unset($iTextExtractor);
                            }
                            else
                            {
                                echo "Information Extraction";
                            }
                    ?>
                    </a></h3>
                    <hr />
                    <div class="entry">
                        <p>
                        <?php
                            if($tweet) 
                            {
                                echo $text;
                            }
                        ?>
                        </p>
                    </div>
                </div>
            <?php } ?>

		</div>
		<div id="sidebar">
			<ul>
				<li>
					<h2>List of Tweets</h2><hr />
					<ul>
						<?php
						$perNumber=15; //每页显示的记录数
						$page=$_GET['page']; //获得当前的页面值
						$count=mysql_query("select count(*) from tweets"); //获得记录总数
						$rs=mysql_fetch_array($count); 
						$totalNumber=$rs[0];
						$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
						if (!isset($page)) {
						 $page=1;
						} //如果没有值,则赋值1
						$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录
						$result=mysql_query("SELECT `ID`,`SearchKeywords` FROM `tweets` WHERE 1 limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数
						while ($row=mysql_fetch_array($result)) {
							if(isset($_GET['page'])) echo "<li><a href= '?page=".$_GET['page']."&tweet=".$row[0]."'>Tweet $row[0]: $row[1]</a></li>";
							else echo "<li><a href= '?page=1&tweet=".$row[0]."'>Tweet $row[0]: $row[1]</a></li>";
						}
						
						for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
							if(isset($_GET['tweet'])&&$i==$page){
							?>
							<a href="index.php?page=<?php echo $i;?>&tweet=<?php echo $_GET['tweet'];?>" class="current">&gt;<?php echo $i ;?>&lt;</a>
							<?php
							}
							else if($_GET['tweet']&&$i!=$page){
								?>
							<a href="index.php?page=<?php echo $i;?>&tweet=<?php echo $_GET['tweet'];?>"><?php echo $i ;?></a>
							<?php
							}
							else{
							?>
							<a href="index.php?page=<?php echo $i;?>"><?php echo $i ;?></a>
							<?php
							}
						}						
						?>
					</ul>
				</li>
			</ul>
		</div>
		
	</div>
</div>
<div id="footer">
	<p>Copyright (c) 2012 Sitename.com. All rights reserved. photo by <a href="http://fotogrph.com/">fotogrph</a>. Design by <a href="http://www.freecsstemplates.org/">FCT</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
