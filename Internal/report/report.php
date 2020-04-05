<?php
session_start(); //to start sesstion
include("../include/session_handling.php");
require_once("../include/dbconnection_inc.php");
?>


<html>
<head>
<title>NMPT</title>
<!-- To call Extenal CSS -->
<link rel="stylesheet" type="text/css" href="../css/layout.css" />

<link href="../common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="../common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- To call external js file -->
<script type="text/javascript" src="../js/formvalidation.js"></script>
<script src="../common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../common/js/jquery-ui.js" type="text/javascript"></script>
<script src="../common/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../common/js/facebox/loading.gif',
        closeImage   : '../common/js/facebox/closelabel.png'
      });
    })
</script>
<script>
function reMsg(){
	document.getElementById("msg").innerHTML="";	
}

</script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<link rel="icon" href="../images/drama/Drama200x200.png" />
 <script src="../bower_components/jquery/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link href="../common/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="../common/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<!-- To call external js file -->
<script type="text/javascript" src="../js/formvalidation.js"></script>
<script src="../common/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../common/js/jquery-ui.js" type="text/javascript"></script>
<script src="../common/js/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../common/js/facebox/loading.gif',
        closeImage   : '../common/js/facebox/closelabel.png'
      });
    })
</script>
</head>
<body topmargin="0" bottommargin="0" 
leftmargin="0" rightmargin="0" onClick="reMsg()">
<div id="main">
<div id="header">
 <div id="header_content">
    	<?php 
//insert header part
require_once("../include/header.php"); ?>    
    </div>
</div>
<div id="n"><?php require_once("../include/navi.php"); ?>


</div>
<div id="content" style="padding-left:100px">
<h4 align="center">Reports Management</h4>
<table width="95%" border="0" align="center">
  <tr>
    <td width="51%" align="left">
    
    <a href="../login/usermenu.php">
<button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-home"></span> Menu</button></a>
    &nbsp;&nbsp;
    
    </td>
    <td width="49%" class="inp">
      
    
    
      </td>
  </tr>
  
</table>
<br /><br />
<div class="container-fluid">
 
  <div class="row">
    <div class="col-sm-3">
     <p><img src="../images/download.png" height="100" width="auto" /></p>
     <p><a href="paymentreport.php">Payment Reports</a></p>
    </div>
   <div class="col-sm-3">
     <p><img src="../images/download.png" height="100" width="auto" /></p>
     <p><a href="schedulereport.php">Schedule Reports</a></p>
    </div>
     <div class="col-sm-3">
     <p><img src="../images/download.png" height="100" width="auto" /></p>
     <p><a href="bookingreport.php">Booking Reports</a></p>
    </div>
     <div class="col-sm-3">
<p><img src="../images/download.png" height="100" width="auto" /></p>
     <p><a href="dramareport.php">Drama Reports</a></p>
    </div>
  </div>

</div>





</div>
  <div id="pre-footer">
    <div id="pre">  &nbsp;
   <!-- <img src="../images/esoft-logo.jpg" height="40" width="auto" /> -->
    </div>
    
    </div>
<div id="footer1">
<?php
//insert footer part
require_once("../include/footer.php"); ?>

</div>
</div>
</body>
</html>