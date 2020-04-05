<?php
session_start(); //to start sesstion
include("../include/session_handling.php");
require_once("../include/dbconnection_inc.php");
$sql = "SELECT * FROM drama ORDER BY drama_id DESC";
$result = mysql_query($sql) or die(mysql_error());

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
<h4 align="center">Drama Reports</h4>
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

<table border="0" align="center" width="90%" class="table table-responsive table-striped">
    <tr>
    <th>&nbsp;</th>
    <th>Drama Name</th>
    <th>Director</th>
    <th>Category</th>
    <th>Performing</th>
    <th>Language</th>
    <th>Country</th>
  
  </tr>
  <?php while ($row_Recordset1 = mysql_fetch_assoc($result)) { ?>
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
	<?php
	$drama_id=$row_Recordset1['drama_id'];
  $sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
  $resultd=mysql_query($sqld);
	while($rowd=mysql_fetch_array($resultd)){
		echo $rowd['director_name']."<br />";	
	}
		
	?>&nbsp;</td>
    <td><?php echo $row_Recordset1['drama_cat']; ?>&nbsp;</td>
    <td><?php echo $row_Recordset1['performing']; ?>&nbsp;</td>
    <td><?php echo $row_Recordset1['language']; ?>&nbsp;</td>
    <td><?php echo $row_Recordset1['country']; ?>&nbsp;</td>
    
  </tr>
  <?php }  ?>
</table>
<p align="center">
 <a href="dramareportpdf.php" target="_blank">
 <button type="button" name="pdf" class="btn btn-primary" style="background:black">PDF</span></button></a>   
   </p> 
    







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