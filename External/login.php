<?php 
require_once("include/dbconnection_inc.php");


?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BMICH</title>

<!-- favicon (to display logo)-->
<link rel="icon" href="images/logo2 copy1.png">

<link href="common/bootstrap.min.css" rel="stylesheet">

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

<script src="common/bootstrap.min.js"></script>
<script src="common/jquery.min.js"> </script>
<script src="jquery-1.7.1.min.js"> </script>
<script src="slides.min.jquery.js"> </script>
<link type="text/css" rel="stylesheet" href="jq.css">

<link href="CSS/layoutin.css" rel="stylesheet" type="text/css"/>
<link href="CSS/layout.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript"src="jquerislideshow.js"></script>
<script src="js/clientregistration.js"> </script>



</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header.php"); ?>       
<div id="inner_header"></div></div>
<div id="navi"><?php require_once("common/navi.php"); ?></div>
      

<div id="content">

<form method="post" action="clientauthentic.php" id="form1" onSubmit="return checkValidate();">
<table width="243" border="0" align="center" style="color:#000">
  <tr>
    <th colspan="2" align="left"><h3>LOGIN</h3></th>
  </tr>
  <tr>
    <td colspan="2" align="left"><span id="msg" class="error">
  <?php
	if(isset($_REQUEST['msg'])){ 
		echo $_REQUEST['msg'];
	}
	?> </span></td>
    </tr>
  <tr>
    <td width="200" align="left" class="inp">User Name</td>
   </tr>
   <tr>
    <td align="left">
    <input type="email" name="email" id="email" placeholder="Email address" onclick="OnClickField()"></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    
  </tr>
  <tr>
    <td align="left" class="inp">Password</td>
    </tr>
    <tr>
    <td align="left"><label for="pass"></label>
    <input type="password" name="pwd" id="pwd" placeholder="Password" onClick="OnClickField()"></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  
  </tr>
  <tr>
    <td  align="left">
    <button type="submit" name="Login" id="Login"  class="btn but">
          <span class="glyphicon glyphicon-log-in"></span> Log in
       </button></td>
  </tr>
</table>
</form>




</div>


<div id="net">

<div>
      <ul class="nav navbar-nav" style="margin-right:10%; margin-left:10%; margin-top:50px">
        <li style="width:50px"><img src="images/fb.jpg" width="30" height="30"></li>
        <li style="width:50px"><img src="images/g.png" width="30" height="30"></li>
       <li style="width:50px"><img src="images/tw.jpg" width="30" height="30"></li>
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
  <td height="50" align="center" valign="middle" class="fo">Site Designed by Lochana |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>