<?php 
require_once("include/dbconection_inc.php");

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

<script src="jquerislideshow.js"></script>

</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header.php"); ?>       
<div id="inner_header"></div></div>
<div id="navi"><?php require_once("common/navi.php"); ?></div>
      

<div id="content">

</p> </p>

<h2 style="color:#000" align="center"> Buy Tickets </h2>
<form method="post" action="">

 <table width="400" border="0" align="center" style="color:#000">
  <tr>
    <td width="41%" height="35">Select Drama</td>
    <td width="59%">
      <select name="drama" id="drama">
      </select></td>
  </tr>
  <tr>
    <td height="38">Select Show Time</td>
    <td>
      <select name="stime" id="stime">
      </select></td>
  </tr>
  <tr>
    <td height="28">Select Date</td>
    <td>
      <input type="date" name="date" id="date" min="<?php echo $cur_date;?>"
onChange="getS(this.value)"></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><input type="submit" name="next" id="next" value="Next"></td>
  </tr>
  <tr>
    <td height="40">Select Catergory</td>
    <td>
      <select name="seatcat" id="seatcat">
       <option value="">Select Seats Catergory</option>
      <option value="Balcony" selected>Balcony</option>
      <option value="ODC" selected>ODC</option>
      </select></td>
  </tr>
  <tr>
    <td height="35">No of Seats</td>
    <td>
      <select name="noseats" id="noseats">
       <option value>
        <?php for($i=1;$i<=20;$i++){?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>`
       <?php } ?>
       </option>
      </select></td>
  </tr>
  <tr>
    <td height="39">No of Full Tickets</td>
    <td>
      <select name="fticket" id="fticket">
      </select></td>
  </tr>
  <tr>
    <td height="43">No of Half Tickets</td>
    <td>
      <select name="htickets" id="htickets">
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="next2" id="next2" value="Next"></td>
  </tr>
</table>
 
</form>


<h4 align="center" style="color:#000"> Rates </h4>
<table width="350" border="1" align="center" style="color:#000" bordercolor="#CCCCCC">
 <tr align="center" style="font-weight:bold">
      <td width="35%" height="34">Catergory</td>
    <td width="32%">Type</td>
    <td width="33%">Price</td>
  </tr>
  <tr align="center">
    <td>ODC</td>
    <td>Full</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td >ODC</td>
    <td>Half</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td >Balcony</td>
    <td>Full</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td >Balcony</td>
    <td>Half</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>



<div id="net">

<div>
      <ul class="nav navbar-nav" style="margin-right:10%; margin-left:10%; margin-top:50px">
        <li style="width:50px"><img src="images/facebook.png" width="30" height="30"></li>
        <li style="width:50px"><img src="images/twitter.png" width="30" height="30"></li>
       <li style="width:50px"><img src="images/RSS.png" width="30" height="30"></li>
       <li style="width:50px"><img src="images/CSS3.png" width="30" height="30"></li>
      
      </ul>
    </div>
</div>

<div id="footer">
<table width="100%" border="0" align="center" class="fo1">
  <tr>
  <td height="50" align="center" valign="middle" class="fo">Site Designed by Loch |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>