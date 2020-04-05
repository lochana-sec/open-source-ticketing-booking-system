<?php 
require_once("include/dbconnection_inc.php");
$sid=$_REQUEST['sid'];

$sql="SELECT * FROM drama d,schedule s, time_slot ts 
WHERE d.drama_id=s.drama_id AND 
ts.time_slot_id=s.time_slot_id  
AND schedule_id='$sid'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);

$drama_id=$row['drama_id'];
$drama_name=$row['drama_name'];
$time_slot_id=$row['time_slot_id'];
$description=$row['description'];
$date=$row['date'];

//To get ticket prices
$sqlprice="SELECT * FROM ticket_price 
WHERE schedule_id='$sid'";
$resultprice=mysql_query($sqlprice);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>NMPT</title>

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
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="jquerislideshow.js"></script>
<script>
function getSeats(no){
	str="<option value='0'>Select Full Seats</option>";
	for(i=no;i>=0;i--){
		str+="<option value='"+i+"'>"+i+"</option>";
	}
	document.getElementById('fticket1').innerHTML=
	"<select name='fticket' onChange='getFSeats(this.value,"+no+")'>"+str+"</select>";
}

function getFSeats(nof,n){
	str1="";
	no1=n-nof;
	if(no1>=1){
	for(i=no1;i>=0;i--){
		str1+="<option value='"+i+"'>"+i+"</option>";
	}
	}else{
		str1+="<option value='0'>0</option>";
		}
	
	document.getElementById('htickets1').innerHTML=
	"<select name='htickets'>"+str1+"</select>";
}

</script>

</head>

<body>
<div id="main">
<div id="header">
<?php require_once("include/header_pro.php"); ?>       
<div id="inner_header"></div></div>
<div id="navi"><?php require_once("common/navi_pro.php"); ?></div>
      

<div id="content" 
style="padding-left:100px; padding-right:100px;
min-height:600px">
<p></p>
<div style="color:#000; background-color:#F2F2F2; color:black;
height:40px; padding-top:1px;" align="center" > 
<span style="font-size:24px; color:black">1</span>
<span style="font-size:16px;padding-right:10px;font-weight:bold; color:black">Select Preferences</span> 
<span style="font-size:24px; color:#A49999">2</span>
<span style="font-size:16px;padding-right:10px;color:#A49999">
Seat Plan</span> 
<span style="font-size:24px;color:#A49999" >3</span>
<span style="font-size:16px;padding-right:10px;color:#A49999">
Confirm Booking</span> 
<span style="font-size:24px;color:#A49999">4</span>
<span style="font-size:16px;padding-right:10px;
color:#A49999">Make Payment</span> 
 </div>
 <p></p>
<form method="post" action="seatplan.php?sid=<?php echo $sid; ?>">
 <table width="600" border="0" align="center" 
 style="color:#000; font-weight:" class="table table-hover">
  <tr>
    <td width="41%" height="35">Selected Drama</td>
    <td width="59%">
   <?php echo $drama_name; ?>
    </td>
  </tr>
  <tr>
    <td height="38">Selected Show Time</td>
    <td>
      <?php echo $description; ?></td>
  </tr>
  <tr>
    <td height="28">Selected Date</td>
    <td>
      <input type="date" name="date" id="date"
      value="<?php echo $date; ?>" readonly></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40">Select Catergory</td>
    <td>
      <select name="seatcat" id="seatcat" required>
       <option value="">Select Seats Catergory</option>
      <option value="Balcony">Balcony</option>
      <option value="Gallery">Gallery</option>
      </select></td>
  </tr>
  <tr>
    <td height="35">No of Seats</td>
    <td>
      <select name="noseats" id="noseats" required 
      onChange="getSeats(this.value)">
       <option value="">Select No of Seats </option>
        <?php for($i=1;$i<=5;$i++){?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>`
       <?php } ?>
       </option>
      </select></td>
  </tr>
  <tr>
    <td height="39">No of Full Tickets</td>
    <td><span id="fticket1">
    <select name='fticket' id='fticket'>
    
    </select>
    &nbsp;</span>
      </td>
  </tr>
  <tr>
    <td height="43">No of Half Tickets</td>
    <td>
    <span id="htickets1">
      <select name="htickets" id="htickets">
      </select>
      </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;
    
    </td>
    <td><button type="submit" class="btn btn-primary" 
    style="background-color:black" name="con">Continue >></button>&nbsp;</td>
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
  <?php while($rowprice=mysql_fetch_assoc($resultprice)) { ?>
  <tr align="center">
    <td><?php echo $rowprice['category']; ?></td>
    <td><?php echo $rowprice['type']; ?></td>
    <td><?php echo $rowprice['price']; ?>&nbsp;</td>
  </tr>
  <?php } ?>
</table>





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
  <td height="50" align="center" valign="middle" class="fo1">Site Designed by Loch  |  copyright &copy; reserved by NMPT Threatre 
    Sri Lanka 2014-2015&nbsp;</td>
  </tr>
  </table>

</div>

</div>

</body>
</html>