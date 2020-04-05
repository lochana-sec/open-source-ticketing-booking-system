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
<script>
function getS(s)
	
          {
			var sref=s; 
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }   
            xmlhttp.onreadystatechange=function()
            {
              document.getElementById("show").innerHTML = '<img src="images/loading.gif" alt="Please Wait" align="middle" />';

              if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                document.getElementById("show").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("GET","functionajaxS.php?s="+sref,true);
            xmlhttp.send();            
          }
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
      
<div id="slide" align="center">
<br />
<!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. --><!-- Loading Screen -->
        <div style="position: relative; width: 900px; height: 300px;" id="slider1_container">
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:.7; position: absolute; display: block;
                            background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
              </div>
                        <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                            top: 0px; left: 0px;width: 100%;height:100%;">
                        </div>
          </div>



                    <div u="slides" style="cursor: move; position: absolute; width: 900px;
                     height: 300px;top:0px;left:0px;overflow:hidden;">
                    
                        <!-- Slide -->
                         <?php while ($row=mysql_fetch_array($result)){ ?>
                        <div>
                            
                            <img u="image" src="../internal/drama/drama_image/<?php echo $row['image']; ?>" >
                        </div>
                        <?php } ?>
                   
                    </div>
    </div>
                <!-- Jssor Slider End -->
<script>
        slideshow_transition_controller_starter("slider1_container");
    </script>
</td></tr></table>
</div>
<div id="content">
<div id="content_left"> 
<table border="0" class="table" >
<?php $num=mysql_num_rows($resultb);
$count=1; $no=2;
while ($rowb= mysql_fetch_array($resultb)){

	
	?>
    <?Php if($count%$no==1){?>
    <tr><?php }?>
    <?php //if($sum%2==1){?>
    <td >
    <table border="0" style="color:black">
 <tr><td class="drama"><?php echo $rowb['drama_name']; ?></td></br></tr>
<tr> <td><img width='200' height='auto' src="../internal/drama/drama_image/<?php echo $rowb['image']; ?>"  />
 </td></tr>
 
 <tr><td>Date :<?php echo $rowb['date'];?></td></tr>
 <tr><td height="36">Show Time :<?php echo $rowb['description'];?></td></tr>
 <tr><td><span style="float:left">
 <?php 
 
 if(isset($_SESSION['status']) && 
 $_SESSION['status']==1){ ?>
<a href="dramabooking.php?sid=<?php 
 echo $rowb['schedule_id'];?>">
 <button type="button" class="btn btn-default">
  Booking</button> </a>
 <?php }else { ?> 
  <button type="button" class="btn btn-default"
  onClick="javascript:alert('Please Login to continue');">
  Booking</button>
  <?php } ?>
</span>
<span style="float:right; padding-right:8px">
<a href="viewdrama.php?did=<?php echo $rowb['drama_id'];?>" rel="facebox"><button type="button" class="btn btn-default"> Read More</button></a></span>
 </table>
 </td>
 <?php if($count%$no==0){?>
  </tr>
 <?php } ?>

  <?php $count++; ?>
 <?php }?>

 </table>
</div>
<div id="content_right">

<!-- Login @ index page -->

<p class="para2">
<?php if(isset($_SESSION['status'])){
	if($_SESSION['status']==1){ ?>


<?php }else{?>
<table width="100%" border="0" style="color:black"><form method="post" action="clientauthentic.php" id="form1">
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
    </tr> </form>
  <tr>
    <td colspan="1"> <a href="clientregistration.php">
    
    <button class="btn btn-success" type="submit">
    
    Registration</button>
    </a></td>
    </tr>
</table>
 


<?php } } else{?>

<table width="100%" border="0" style="color:black">
 <tr> <span id="msg" class="error">
  <?php
	if(isset($_REQUEST['msg'])){ //To check the value
		echo $_REQUEST['msg'];
	}
	?> </span>
    &nbsp;
 </tr>
 <form method="post" action="clientauthentic.php" id="form1">
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
    <td colspan="1" align="center"><input name="login" type="submit" id="login" class="btn-sm btn-success"  value="Login"></td>
    </tr> </form>
  <tr>
    <td colspan="1" > <a href="clientregistration.php">
    <button class="btn btn-success" type="submit">
    
    Registration</button></a></td>
    </tr>
</table>
 
 <?php } ?> 
  
  
<p class="para1">Quick Booking</p>

<P class="para2">Booking Date  :<input type="date" name="date" id="date"  min="<?php echo $cur_date;?>"
onChange="getS(this.value)"/></P>
<div id="showbookings"></div>
<p class="para1">Drama Schedule</p>
<p class="para2"> 
<span id="show">

  </span>
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
  <td height="50" align="center" valign="middle" class="fo1">Site Designed by Lochana |  copyright &copy; reserved by NMPT
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>