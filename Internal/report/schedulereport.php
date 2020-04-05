<?php
session_start(); //to start sesstion
include("../include/session_handling.php");
require_once("../include/dbconnection_inc.php");

if(isset($_POST['sea'])){
	$f=$_POST['from'];
	$t=$_POST['to'];
$sql = "SELECT * FROM drama d,schedule s, time_slot ts
WHERE s.drama_id=d.drama_id AND 
s.time_slot_id=ts.time_slot_id AND s.date BETWEEN '$f' AND '$t'";
$result = mysql_query($sql) or die(mysql_error());

}
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
<h4 align="center">Schedule Reports</h4>
<table width="95%" border="0" align="center">
  <tr>
    <td width="51%" align="left">
    
    <a href="../login/usermenu.php">
<button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-home"></span> Menu</button></a>
    &nbsp;&nbsp;
    <a href="report.php">
<button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-home"></span>Report</button></a>
    </td>
    <td width="49%" class="inp">
      
    
    
      </td>
  </tr>
  
</table>
<br /><br />
<div class="container-fluid">
 <form action="schedulereport.php" method="post">
  <div class="row">
    <div class="col-sm-4">
    From :
     <input type="date" name="from" required />
    </div>
   <div class="col-sm-4">
   To:
     <input type="date" name="to" required />
    </div>
     
     <div class="col-sm-4">
     <button name="sea" type="submit" class="btn btn-success" id="sea">
    <span class="glyphicon glyphicon-search"></span> Search</button>
&nbsp;
    </div>
  </div>
</form>
</div>
<?php if(isset($_POST['sea'])){
	echo "From : ".$f." "."To :".$t; ?>
<table border="0" align="center" width="90%" class="table table-condensed">
    <tr>
    <th>&nbsp;</th>
    <th>Drama Name</th>
    <th>Date</th>
    <th>Time Slot</th>
    <th>Balcony</th>
    <th>Gallery</th>
   
  </tr>
  <?php while ($row_Recordset1 = mysql_fetch_assoc($result)){ ?>
  <tr>
    <td align="center" valign="middle">
    <?php if($row_Recordset1['image']==""){ ?>
		<img src='../drama/drama_image/drama2.png' width="75" height="auto" />
	
    <?php }else{?>
		<img src='../drama/drama_image/<?php echo $row_Recordset1['image']; ?>' width="75" height="auto" />
        
        <?php
	}
	?>
    
    
    &nbsp;</td>
    <td><?php echo $row_Recordset1['drama_name']; ?>&nbsp;</td>
    <td>
    <?php echo $row_Recordset1['date']; ?>
	&nbsp;</td>
    <td><?php echo $row_Recordset1['description']; ?>&nbsp;</td>
    <td style="font-size:14px;" ><?php 
	
	$schedule_id=$row_Recordset1['schedule_id'];
	$sql1="SELECT * FROM ticket_price 
	WHERE schedule_id='$schedule_id' 
	AND category='Balcony'";
	$result1=mysql_query($sql1);
	
	while($row1=mysql_fetch_array($result1)){
		echo $row1['price']."(".$row1['type'].")<br />";
	}
		
	?>&nbsp;</td>
    <td style="font-size:14px;">
    <?php 
	
	$schedule_id=$row_Recordset1['schedule_id'];
	$sql1="SELECT * FROM ticket_price 
	WHERE schedule_id='$schedule_id' 
	AND category='Gallery'";
	$result1=mysql_query($sql1);
	
	while($row1=mysql_fetch_array($result1)){
		echo $row1['price']."(".$row1['type'].")<br />";
	}
		
	?>
    
    
    
    
    &nbsp;</td>
   
  </tr>
  <?php }  ?>
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