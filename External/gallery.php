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


</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header.php"); ?>       
<div id="inner_header"> </div></div>
<div id="navi"><?php require_once("common/navi.php"); ?></div>

<div id="content" style="color:#000">
<div id="content_left" style="color:#000"> 
<H3>Gallery</H3>
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
  </p></p></div>
  <div id="content_left">
  <p>The .thumbnail class can be used to display an image gallery. Click on the images to see it in full size:</p>            
  <div class="row">
    <div class="col-md-4">
      <a href="images/Dram/11_b.jpg" class="thumbnail">
        <p>sriyantha mendis and kusum renu</p>    
        <img src="images/Dram/11_s.jpg" alt="Pulpit Rock" style="width:100px;height:150px">
      </a>
    </div>
    <div class="col-md-4">
      <a href="images/Dram/apahu_harenna_be.jpg" class="thumbnail">
        <p>apahu harenna".</p>
        <img src="images/Dram/apahu_harenna_be.jpg"alt="Moustiers Sainte Marie" style="width:150px;height:150px">
      </a>
    </div>
    <div class="col-md-4">
      <a href="images/Dram/images (1).jpg" class="thumbnail">
        <p>Mama And Bana.</p>      
        <img src="images/Dram/images (1).jpg" alt="Cinque Terre" style="width:150px;height:150px"></a></div>
        <div class="col-md-4">
      <a href="images/Dram/images" (1).jpg" class="thumbnail">
        <p>Rathran.</p>      
        <img src="images/Dram/284.jpg"(1).jpg" alt="Cinque Terre" style="width:150px;height:150px"></a></div>
         <div class="col-md-4" >
      <a href="images/Dram/z_p-46-Madyawediyakuge.jpg"class="thumbnail">
        <p>Dagaya.</p>      
        <img src="images/Dram/z_p-45-Dangaya.jpg" alt="Cinque Terre" style="width:150px;height:150px"></a></div>
        
        
        
      </a>
    </div>
  </div>
</div>

  
</p>
</div>
</div>s
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