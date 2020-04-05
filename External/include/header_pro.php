<?php
if(!isset($_SESSION)){
	session_start();	
}
?>

<style type="text/css">
a.a1{color:white}
table{color:white}
</style>
<link href="../css/layout.css" type="text/css" rel="stylesheet"/>
<link href="../css/layoutin.css" type="text/css" rel="stylesheet" />
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<table width="100%" border="0" height="150">
  <tr>
    <td width="9%" rowspan="2"><img src="images/logo2 copy1.png" width="95" height="112"></td>
    <td width="54%" rowspan="2" class="fo2"> &nbsp;&nbsp;NMPT Drama Threatre</td>
    <td width="5%"><img src="images/hotline.png" width="45" height="45" /></td>
    <td width="16%">0711996905</td>
    <td width="5%"><img src="images/mail.png" width="45" height="45" /></td>
    <td width="11%">NMPT@gmail.lk</td>
  </tr>
  <tr>
    <td colspan="4">
    <!-- Login @ index page -->

<?php if(isset($_SESSION['status'])){
	if($_SESSION['status']==1){ ?>
	  <table width="90%" border="0" style="color:white">
  <tr>
    <td width="30" height="39" style="color:white">
    <i class="glyphicon glyphicon-user"></i>
    &nbsp;</td>
    <td width="145" style="color:white">&nbsp;
    <?php echo $_SESSION['fname']." ".$_SESSION['lname'];

	?>
    
    </td>
    <td width="83">&nbsp;
    </td>
    
  </tr>

</table>
    
<?php 
	}
}
	?>    
    &nbsp;</td>
  </tr>
</table>
