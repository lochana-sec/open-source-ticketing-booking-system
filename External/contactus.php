
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
<H3 class="alert-info">Contact Us</H3>
<p>NMPT Theaters offices are situated at the Savoy building, Borella - Colombo8. Should you wish to contact us for any matter you can reach us on the following address or Contact Numbers listed below.</p>
 <br>
 <div class="col-sm-3">
 
 <form action="contactprocess.php" method="post">
 <label>Name</label>
 <input name="name" type="text" size="40" class="alert-info">
 <br><p></p><p></p>
  <label>Phone number</label><input name="pname" type="text" size="40" class="alert-info"><p></p>
  <label>Email Address</label><input name="email" type="text" size="40" class="alert-info"><p></p>
  <p>
    <label>Message</label>
    <textarea name="mess" cols="30" rows="3" class="alert-info"></textarea>
  </p>
  <button type="submit" class="btn btn-primary">Sent <span class="badge"></span></button>
   <button type="sumbit" class="btn btn-primary">Cancle <span class="badge"></span></button>
   </form>
   <h3>Namel Malini punchi theatre</h3>
  <h3>kotta rode</h3>
  <h3>Borella</h3>
  <h3>Colombo 08</h3>
   
   <p></p>
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1980.4013248306999!2d79.8790678!3d6.9141839!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2599c1a5b248f%3A0xc7e13ba0836b3294!2sNamel+Malani+Punchi+Theatre!5e0!3m2!1sen!2slk!4v1437643096321" width="600" height="450" frameborder="0" width="50px" height="100px" style="border:0" allowfullscreen></iframe>
   
   <p></p>
  
   </div>
   <div id="content_right">
   <iframe width="400" height="200"
src="http://www.youtube.com/embed/rpkgmz3YUN0">
</iframe>

<br>
  
<iframe width="400" height="200"
src="http://www.youtube.com/embed/IbRrTPSKdaY">
</iframe>
   </div>
  <p>&nbsp; </p>
</div>
<p>&nbsp;</p>
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
  <td height="50" align="center" valign="middle" class="fo">Site Designed by Loch  |  copyright &copy; reserved by NMPTThreatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>
?>