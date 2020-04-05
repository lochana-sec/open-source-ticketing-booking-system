<?php
session_start();
session_destroy();

//To redirect within 5 seconds
header("refresh:5, url=index.php");


?>

<html>
<head>
<title>Login</title>
<!-- To call Extenal CSS -->
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
<!-- <script type="text/javascript" src="../js/formvalidation.js"></script> -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
<div id="navi">&nbsp;</div>
<div id="content">

<p align="center">Successfully Login out</p>
<p align="center"><a href="index.php">Login</a></p>
<p align="center"><img src="../images/loading.gif" /> </p>

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