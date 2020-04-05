<?php
session_start();
session_destroy();

//To redirect within 5 seconds
header("refresh:5, url=index.php");


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
<?php require_once("include/header_pro.php"); ?>       
<div id="inner_header"></div></div>
<div id="navi">&nbsp;</div>
      

<div id="content">

<h1 align="center" style="color:#000">Successfully Login out</h1>>
<p align="center"><a href="index.php">Login</a></p>
<p align="center"><img src="images/loading.gif"  width="150"/> </p>

</div>
</div>
<div id="footer">
</div>

</body>
</html>