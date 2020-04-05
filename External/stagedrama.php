<?php 
session_start();
require_once("include/dbconnection_inc.php");
$cur_date=date("Y-m-d");

//to select last 4 dramas to display in slideahow
$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND ts.time_slot_id=s.time_slot_id  ORDER BY s.date DESC LIMIT 5";
$result=mysql_query($sql);

$sqlb="SELECT * FROM drama d,schedule s, time_slot ts
WHERE d.drama_id=s.drama_id AND ts.time_slot_id=s.time_slot_id AND s.date>'$cur_date' ORDER BY s.date DESC";
$resultb=mysql_query($sqlb);

//to display drama names in drama search txt box
$sqldrama="SELECT * FROM drama ORDER BY drama_name";
$resultdrama=mysql_query($sqldrama);

if(isset($_POST['sea'])){
	$search=$_POST['typeahead'];

$sql="SELECT * FROM drama WHERE drama_name LIKE '$search%'";
$result=mysql_query($sql);

//To count no of records
$count=mysql_num_rows($result);

}


?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>NMPT</title>

<!-- favicon (to display logo)-->
<link rel="icon" href="images/drama2.png">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- To call external js file -->
<script type="text/javascript" src="../js/clear.js"></script>
<script type="text/javascript" src="../js/formvalidation.js"></script>


<script src="common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="common/js/jquery-ui.js" type="text/javascript"></script>
<script src="common/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'common/js/facebox/loading.gif',
        closeImage   : 'common/js/facebox/closelabel.png'
      });
    })
</script>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common/jquery.min.js"> </script>

<script src="jquery-1.7.1.min.js"> </script>
<script src="slides.min.jquery.js"> </script>
<link type="text/css" rel="stylesheet" href="jq.css">

<link href="CSS/layoutin.css" rel="stylesheet" type="text/css"/>
<link href="CSS/layout.css" rel="stylesheet" type="text/css"/>

<script src="jquerislideshow.js"></script>
<script type="text/javascript" src="js/loginvalidate.js"></script>

<link type="text/css" rel="stylesheet" href="css/slider.css" />
<script type="text/javascript" src="js/slideshow-transition-builder-controller.min.js"></script>


<link type="text/css" rel="stylesheet" 
href="bootstrap-3.3.4/css/bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="bootstrap-3.3.4/js/bootstrap.min.js"></script>






  <script src="js/typeahead.min.js"></script>
    <script src="js/live.js"> </script>
<link rel="stylesheet" href="css/live.css" type="text/css" />
</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header.php"); ?>       
<div id="inner_header"> </div></div>
<div id="navi"><?php require_once("common/navi.php"); ?></div>

<div id="content" style="color:#000">
<div id="content_left" style="color:#000"> 
<H3>Stage Drama</H3>
 <div class="bs-example">
    <form action="stagedrama.php" method="post">
    
        <input type="text" name="typeahead" 
        class="typeahead tt-query input-md" autocomplete="off" 
        spellcheck="false" placeholder="Type your Query"
        id="aa"><br />
      
        
      <button name="sea" type="submit" class="btn btn-success" id="sea">
    <span class="glyphicon glyphicon-search"></span> Search</button>
       
      </form>  
    </div>
    
    <hr />
    <p class="alert-danger">
    <?php
	if(isset($_POST['sea'])){
	if($count==0){
		echo "No Records found";	
		
	}
	
	?>
    </p>
    
    <?php while($row=mysql_fetch_array($result)){ ?>
    <table width="80%" border="0" style="color:black">
      <tr>
        <td><h4><?php echo $row['drama_name']; ?></h4>&nbsp;</td>
        </tr>
      <tr>
        <td><?php echo $row['performing']; ?>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" style="color:black">
          <tr>
            <td width="38%" rowspan="6">
            <?php if($row['image']==""){ ?>
		<img src='../internal/drama/drama_image/drama2.png' width="100" height="auto" />
	
    <?php }else{?>
		<img src='../internal/drama/drama_image/<?php echo $row['image']; ?>' width="100" height="auto" />
        
        <?php
	}
	?>
            
            &nbsp;</td>
            <td width="17%">Director</td>
            <td width="45%">
            <?php
	$drama_id=$row['drama_id'];
  $sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
  $resultd=mysql_query($sqld);
  $dirarray=array();
	while($rowd=mysql_fetch_array($resultd)){
		array_push($dirarray,$rowd['director_name']);	
	}
		
	?>
        <?php echo implode(",",$dirarray); ?>     
            &nbsp;</td>
          </tr>
          <tr>
            <td>Year</td>
            <td><?php echo $row['intro_year']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Category</td>
            <td><?php echo $row['drama_cat']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Language</td>
            <td><?php echo $row['language']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Country</td>
            <td><?php echo $row['country']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right" >
            <a href="viewdrama.php?did=<?php echo $row['drama_id']; ?>" rel="facebox" 
      >
         <button type="button" class="btn btn-success">   More Details</button></a></td>
          </tr>
          <tr>
            <td colspan="3"><hr />&nbsp;</td>
            </tr>
        </table></td>
        </tr>
    </table>
    <?php }
	}?>
    
    
    
</div>

<div id="content_right">

<!-- Login @ index page -->

<p class="para2">
<?php if(isset($_SESSION['status'])){
	if($_SESSION['status']==1){ ?>


<?php }else{?><form method="post" action="clientauthentic.php" id="form1">
<table width="100%" border="0" style="color:black">
 <tr> <span id="msg" class="error">
  <?php
	if(isset($_REQUEST['msg'])){ //To check the value
		echo $_REQUEST['msg'];
	}
	?> </span>
    &nbsp;
 </tr>
  <tr>
    <td width="36%">Email</td>
    </tr>
    <tr><td width="64%"><input type="email" name="email" id="email" 
    placeholder="Email address" class="input input-sm"/></td>
  </tr>
  <tr>
    <td>Password</td></tr>
    <tr><td><input type="password" name="pwd" id="pwd" placeholder="Password" class="input-sm"/></td>
  </tr>
  <tr>
    <td colspan="1">&nbsp; </td>
    </tr>
  <tr>
    <td colspan="1" align="center"><input name="login" type="submit" id="login" class="btn-sm btn-primary" style="background:#000" value="Login"></td>
    </tr>
  <tr>
    <td colspan="1"> <a href="clientregistration.php">Registration</a></td>
    </tr>
</table>
  </form>


<?php } } else{?>
<form method="post" action="clientauthentic.php" id="form1">
<table width="100%" border="0" style="color:black">
 <tr> <span id="msg" class="error">
  <?php
	if(isset($_REQUEST['msg'])){ //To check the value
		echo $_REQUEST['msg'];
	}
	?> </span>
    &nbsp;
 </tr>
  <tr>
    <td width="36%">Email</td>
    </tr>
    <tr><td width="64%"><input type="email" name="email" id="email" placeholder="Email address"/></td>
  </tr>
  <tr>
    <td>Password</td></tr>
    <tr><td><input type="password" name="pwd" id="pwd" placeholder="Password"/></td>
  </tr>
  <tr>
    <td colspan="1">&nbsp; </td>
    </tr>
  <tr>
    <td colspan="1" align="center"><input name="login" type="submit" id="login" class="btn-sm btn-primary" style="background:#000" value="Login"></td>
    </tr>
  <tr>
    <td colspan="1"> <a href="clientregistration.php">Registration</a></td>
    </tr>
</table>
  </form>
 <?php } ?> 
  
  
<p class="para1">Quick Booking</p>

<P class="para2">Booking Date  :<input type="date" name="date" id="date" min="<?php echo $cur_date;?>"/></P>
<div id="showbookings"></div>
<p class="para1">Drama Search</p>
<p class="para2"> Drama name :

  <select name="dname"> 
  <?php while ($rowdrama=mysql_fetch_array($resultdrama)){?>
    <option value="<?php echo $rowdrama['drama_id'];?>">
    <?php echo $rowdrama['drama_name']; ?></option>
	<?php } ?> 
  </select>
  
</p>
</div>
</div>
<div id="net">

<div>
      <ul class="nav navbar-nav" style="margin-right:10%; margin-left:10%; margin-top:50px">
        <li style="width:50px"><img src="images/fb.jpg" width="30" height="30"></li>
        <li style="width:50px"><img src="images/tw.jpg" width="30" height="30"></li>
       <li style="width:50px"><img src="images/g.png" width="30" height="30"></li>
       <li style="width:50px"><img src="images/ut.jpg" width="30" height="30"></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
</div>

<div id="footer">
<table width="100%" border="0" align="center" class="fo1">
  <tr>
  <td height="50" align="center" valign="middle" class="fo">Site Designed by UOM  |  copyright &copy; reserved by BMICH Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>