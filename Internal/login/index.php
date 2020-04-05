<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Web Based Ticket Booking System</title>
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="icon" href="../images/drama.jpg" />
<script src="../js/formvalidation.js"></script>
</head>
<body>
<div id="main">
	<div id="header">
    <div id="header_content">
    	<?php 
//insert header part
require_once("../include/header.php"); ?>    
    </div>
    </div>
    <div id="navi">&nbsp;</div>
    <div id="content">
    
    
    <?php require_once("login.php"); ?>
    
    </div>
      <div id="pre-footer"> </div>
    <div id="footer"></div>
  
   
    <?php
    //insert footer part
require_once("../include/footer.php"); ?>
    
   
    
    </div>
</div>


</body>
</html>