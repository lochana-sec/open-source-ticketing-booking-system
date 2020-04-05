<html>
<head>
<title>User Menu</title>
<!-- To call Extenal CSS -->
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
<!-- <script type="text/javascript" src="../js/formvalidation.js"></script> -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"><link rel="icon" href="../images/drama/Drama200x200.png" />
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
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
<div id="content">
<h3 align="center"><?php echo $_SESSION['user_role_name']; ?> Menu </h3>
<?php if($_SESSION['user_role_id']==1){ ?>
<table width="500" border="0" align="center">
  <tr>
    <td align="center" width="250"><img src="../images/UserGroup.png" width="100" height="100"></td>
    <td align="center"><img src="../images/icons-feature-administrate.png" width="100" height="104"></td>
  </tr>
  <tr>
    <td align="center"><a href="../User/usermanagement.php">System User Management</a>&nbsp;</td>
    <td align="center"><a href="../report/userreport.php">Reports</a>&nbsp;</td>
  </tr>
</table>
<?php } ?>

<?php if($_SESSION['user_role_id']==2){ ?>
<table width="1000" border="0" align="center">
  <tr>
    <td align="center"><img src="../images/drama1.png" width="99" height="100"></td>
    <td align="center"><img src="../../images/download.jpg" alt="" width="99" height="100">&nbsp;&nbsp;</td>
    <td align="center"><img src="../../images/unnamed.png" alt="center" width="99" height="99">&nbsp;&nbsp;&nbsp;</td>
    <td align="center"><img src="../images/drama/drama4.jpg" width="99" height="99">&nbsp;</td>
    <td align="center"><img src="../images/download (1).jpg" width="99" height="99"></td>
    <td align="center"><img src="../images/icon_edit.png" width="99" height="99"></td>
    <td align="center"><img src="../images/download.png" width="99" height="99"></td>
  </tr>
  <tr>
    <td align="center"><a href="../drama/dramamanagement.php">Drama Management</a></td>
    <td align="center"><a href="../audience/audiencemanagement.php">Audience Management</a></td>
    <td align="center"><a href="../book/bookmanagement.php">Booking and Seat Management
    </a></td>
    <td align="center">
    <a href="../schedule/schedulemanagement.php">
    Drama Scheduling</a></td>
    <td align="center">
    <a href="../payment/payment.php">Payment Management</a></td>
    <td align="center">
    <a href="../suggestion/suggestion.php">Suggestion Management</td>
    <td align="center">
    <a href="../report/report.php">
    Reports</a></td>
  </tr>
</table>
<?php } ?>


<?php if($_SESSION['user_role_id']==3){ ?>
<table width="800" border="0" align="center">
  <tr align="center">
    <td align="center"><img src="../images/drama1.png" alt="" width="99" height="100"></td>
    <td align="center"><img src="../../images/download.jpg" alt="" width="99" height="100">&nbsp;</td>
    <td><img src="../../images/unnamed.png" alt="center" width="99" height="99"></td>
    <td><img src="../images/drama/drama4.jpg" alt="" width="99" height="99"></td>
    <td><img src="../../../RRSS/download.png" width="99" height="99"></td>
  </tr>
  <tr>
    <td align="center"><a href="../drama/dramamanagement.php">Drama Management</a></td>
    <td align="center">
    <a href="../audience/audiencemanagement.php">Audience Management</a></td>
    <td align="center">
    <a href="../book/bookmanagement.php">Booking and Seat Management</a></td>
    <td align="center">
     <a href="../schedule/schedulemanagement.php">Drama Scheduling</a></td>
    <td align="center"><a href="../report/report.php">Reports</a></td>
  </tr>
</table>
<?php } ?>

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