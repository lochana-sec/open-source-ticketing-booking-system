<?php
if(!isset($_SESSION)){
	session_start();	
}
?>

<style type="text/css">
a.a1{color:white}
table{color:white}
</style>
<link href="../css/layoutin.css" type="text/css" rel="stylesheet" />
<link href="../css/layout.css" type="text/css" rel="stylesheet" /> 
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<table width="100%" border="0" height="150">
  <tr>
    <td width="15%" rowspan="2" align="center"><img src="images/logo2 copy1.png" width="150" height="150"></td>
    <td width="42%" rowspan="2" class="fo1"> &nbsp;Namal Malani Punchi Threatre</td>
    <td width="4%"><img src="images/RTGnBLbTL.png"width="45" height="45"/></td>
    <td width="15%">07771345234</td>
    <td width="5%"><img src="images/email.png" width="45" height="45" /></td>
    <td width="19%">nmpt@gmail.com</td>
  </tr>
  <tr>
    <td colspan="4">
    <!-- Login @ index page -->

<?php if(isset($_SESSION['status'])){
	if($_SESSION['status']==1){ ?>
	  <table width="90%" border="0" style="color:white">
  <tr>
    <td width="30" height="39">
    <i class="glyphicon glyphicon-user"></i>
    &nbsp;</td>
    <td width="145">&nbsp;
    <?php echo $_SESSION['fname']." ".$_SESSION['lname'];

	?>
    
    </td>
    <td width="83">
    <a href="profile.php" class="a1" style="color:white"> <i class="glyphicon glyphicon-tasks" 
    title="Profile"></i>&nbsp; Profile </a></td>
    <td width="161"> 
    <a href="logout.php" class="a1" style="color:white"><i class="glyphicon glyphicon-log-out"
    title="Log Out"></i>&nbsp;LogOut</a></td>
    
  </tr>

</table>
    
<?php 
	}
}
	?>    
    &nbsp;</td>
  </tr>
</table>
