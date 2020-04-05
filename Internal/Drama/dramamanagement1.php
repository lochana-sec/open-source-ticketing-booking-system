<?php
session_start(); //to start sesstion
include("../include/session_handling.php");
require_once("../include/dbconnection_inc.php");
$sql="SELECT * FROM drama ORDER BY drama_id DESC";
$result=mysql_query($sql);
?>
<html>
<head>
<title>User Menu</title>
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
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<link rel="icon" href="../images/drama/Drama200x200.png" />
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
<div id="navi"><?php require_once("../include/navi.php"); ?>


</div>
<div id="content">
<h4 align="center">Drama Management</h4>
<table width="95%" border="0" align="center">
  <tr>
    <td width="51%" align="left">
    
    <a href="../login/usermenu.php">
<button name="Add" type="button" class="btn but" id="Add">
    <span class="glyphicon glyphicon-home"></span> Menu</button></a>
    &nbsp;&nbsp;
    
    <a href="adddrama.php" style="text-decoration:none">
    <button name="Add" type="button" class="btn but" id="Add">
    <span class="glyphicon glyphicon-plus-sign"></span> Add Drama</button></a></td>
    <td width="49%" align="center" class="inp">Search :
      <form action="searchdrama.php" method="post">
      <input type="text" name="search" id="search"> &nbsp;&nbsp;
      
      <button name="sea" type="submit" class="btn but" id="sea">
    <span class="glyphicon glyphicon-search"></span> Search</button>
    </form>
      </td>
  </tr>
  <tr>
    <td colspan="2">
    <p style="margin-left:100px; margin-right:100px; margin-top:10px; color:#006600;
    font-style:italic" align="center">
    <?php
	if(isset($_REQUEST['msg'])){
		echo $_REQUEST['msg'];	
	}
	
	?>
   
    
    &nbsp;
    
    <!-- Drama Details -->
    <table width="100%" border="0" class="table table-hover table-striped" >
  <tr>
    <th>&nbsp;</th>
    <th>Drama Name</th>
    <th>Director</th>
    <th>Category</th>
    <th>Performing</th>
    <th>Language</th>
    <th>Country</th>
    <th>&nbsp;</th>
  </tr>
  <?php while($row=mysql_fetch_array($result)) { ?>
  <tr>
    <td align="center" valign="middle">
    <?php if($row['image']==""){ ?>
		<img src='drama_image/drama2.png' width="75" height="auto" />
	
    <?php }else{?>
		<img src='drama_image/<?php echo $row['image']; ?>' width="75" height="auto" />
        
        <?php
	}
	?>
    
    
    &nbsp;</td>
    <td><?php echo $row['drama_name']; ?>&nbsp;</td>
    <td>
	<?php
	$drama_id=$row['drama_id'];
  $sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
  $resultd=mysql_query($sqld);
	while($rowd=mysql_fetch_array($resultd)){
		echo $rowd['director_name']."<br />";	
	}
		
	?>&nbsp;</td>
    <td><?php echo $row['drama_cat']; ?>&nbsp;</td>
    <td><?php echo $row['performing']; ?>&nbsp;</td>
    <td><?php echo $row['language']; ?>&nbsp;</td>
    <td><?php echo $row['country']; ?>&nbsp;</td>
    <td align="center">
    <a href="editdrama.php?did=<?php echo $drama_id; ?>"><span class="glyphicon glyphicon-edit" title="Edit"></span></a>
    <a href="deletedrama.php?did=<?php echo $drama_id; ?>" onClick="return del('Drama')">
    <span class="glyphicon glyphicon-remove-sign" title="Delete"></span></a>
    <a href="viewdrama.php?did=<?php echo $drama_id; ?>" rel="facebox"><span class="glyphicon glyphicon-eye-open" title="View"></span></a>
    &nbsp;</td>
  </tr>
  <?php } ?>
</table>

    
    
    
    
    </td>
    </tr>
</table>







</div>
  <div id="pre-footer">
    <div id="pre">  &nbsp;
   <!-- <img src="../images/esoft-logo.jpg" height="40" width="auto" /> -->
    </div>
    
    </div>
<div id="footer">
<?php
//insert footer part
require_once("../include/footer.php"); ?>

</div>
</div>
</body>
</html>