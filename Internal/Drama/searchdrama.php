<?php
session_start(); //to start sesstion
//Session handling
include("../include/session_handling.php");


require_once("../include/dbconnection_inc.php");
if(isset($_POST['sea'])){
	$search=$_POST['typeahead'];

$sql="SELECT * FROM drama WHERE drama_name LIKE '$search%'";
$result=mysql_query($sql);

//To count no of records
$count=mysql_num_rows($result);

}else{
	header("Location:dramamanagement.php");	
}
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
<script src="../bower_components/jquery/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/typeahead.min.js"></script>
    <script src="../js/live.js"> </script>
<link rel="stylesheet" href="../css/live.css" type="text/css" />
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
<table width="90%" border="0" align="center">
  <tr>
    <td width="51%" align="left">
    
    <a href="../login/usermenu.php">
<button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-home"></span> Menu</button></a>
    &nbsp;&nbsp;
    
    <a href="dramamanagement.php" style="text-decoration:none">
    <button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-film"></span> Drama Management</button></a></td>
    <td width="49%" class="inp">Search :
      <form action="searchdrama.php" method="post">
     <input type="text" name="typeahead" 
        class="typeahead tt-query input-md" autocomplete="off" 
        spellcheck="false" placeholder="Type your Query"
        id="aa">
      <button name="sea" type="submit" class="btn btn-success" id="sea">
    <span class="glyphicon glyphicon-search"></span> Search</button>
    </form>
      </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <hr />
    <p class="alert-danger">
    <?php
	if($count==0){
		echo "No Records found";	
		
	}
	
	?>
    </p>
    
    <?php while($row=mysql_fetch_array($result)){ ?>
    <table width="80%" border="0">
      <tr>
        <td><h4><?php echo $row['drama_name']; ?></h4>&nbsp;</td>
        </tr>
      <tr>
        <td><?php echo $row['performing']; ?>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="38%" rowspan="6">
            <?php if($row['image']==""){ ?>
		<img src='drama_image/drama2.png' width="100" height="auto" />
	
    <?php }else{?>
		<img src='drama_image/<?php echo $row['image']; ?>' width="100" height="auto" />
        
        <?php
	}
	?>
            
            &nbsp;</td>
            <td width="17%">Director</td>
            <td width="45%">
            <?php
	$drama_id=$row['drama_id'];
  $sqld="SELECT * FROM dir_drama dd,director d WHERE dd.director_id=d.director_id AND dd.drama_id='$drama_id'";
  $resultd=mysql_query($sqld);
  $dirarray=array();
	while($rowd=mysql_fetch_array($resultd)){
		array_push($dirarray,$rowd['director_name']);	
	}
		
	?>
        <?php echo implode(",",$dirarray); ?>     
            &nbsp;</td>
          </tr>
          <tr>
            <td>Year</td>
            <td><?php echo $row['intro_year']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Category</td>
            <td><?php echo $row['drama_cat']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Language</td>
            <td><?php echo $row['language']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Country</td>
            <td><?php echo $row['country']; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">
            <a href="viewdrama.php?did=<?php echo $row['drama_id']; ?>" rel="facebox" 
      >
            More Details</a></td>
          </tr>
          <tr>
            <td colspan="3"><hr />&nbsp;</td>
            </tr>
        </table></td>
        </tr>
    </table>
    <?php } ?>
    
    
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