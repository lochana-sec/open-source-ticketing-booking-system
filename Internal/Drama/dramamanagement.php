<?php
session_start(); //to start sesstion
include("../include/session_handling.php");
require_once("../include/dbconnection_inc.php");
?>
<?php require_once('../../Connections/con1.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 5;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_con1, $con1);
$query_Recordset1 = "SELECT * FROM drama ORDER BY drama_id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $con1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>


<html>
<head>
<title>User Menu</title>
<!-- To call Extenal CSS -->
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
    <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    
    <style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	
	font-size: 12px;
	height: 30px;
	line-height: 20px;
	/*outline: medium none; */
	margin-top:-20px;
	padding: 0px 0px;
	width: 300px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 300px;
}
.tt-suggestion {
	font-size: 12px;
	line-height: 20px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
</style>
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
<button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-home"></span> Menu</button></a>
    &nbsp;<a href="adddrama.php" style="text-decoration:none">
    <button name="Add" type="button" class="btn btn-success" id="Add">
    <span class="glyphicon glyphicon-plus-sign"></span> Add Drama</button></a></td>
    <td width="49%" class="inp">
       <div class="bs-example">
    <form action="searchdrama.php" method="post">
    Search :
        <input type="text" name="typeahead" 
        class="typeahead tt-query input-md" autocomplete="off" 
        spellcheck="false" placeholder="Type your Query"
        id="aa">
      <button name="sea" type="submit" class="btn btn-success" id="sea">
    <span class="glyphicon glyphicon-search"></span> Search</button>
       
      </form>  
    </div>
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
   
   <table border="0" class="table table-hover>
  <tr>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">
      <img src="First.gif" />&nbsp;</a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">
      &nbsp;<img src="Previous.gif" />&nbsp;</a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">
      &nbsp;<img src="Next.gif" />&nbsp;</a>
      <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">
      &nbsp;<img src="Last.gif" /></a>
      <?php } // Show if not last page ?></td>
  </tr>
</table>
Records <?php echo ($startRow_Recordset1 + 1) ?> to <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> of <?php echo $totalRows_Recordset1 ?>
</p>
   
   
    
    &nbsp;
    
    <!-- Drama Details -->
    <table border="1" align="center" width="90%">
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
  <?php do { ?>
  <tr>
    <td align="center" valign="middle">
    <?php if($row_Recordset1['image']==""){ ?>
		<img src='drama_image/drama2.png' width="75" height="auto" />
	
    <?php }else{?>
		<img src='drama_image/<?php echo $row_Recordset1['image']; ?>' width="75" height="auto" />
        
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
    <td align="center">
    <a href="editdrama.php?did=<?php echo $drama_id; ?>"><span class="glyphicon glyphicon-edit" title="Edit"></span></a>
    <a href="deletedrama.php?did=<?php echo $drama_id; ?>" onClick="return del('Drama')">
    <span class="glyphicon glyphicon-remove-sign" title="Delete"></span></a>
    <a href="viewdrama.php?did=<?php echo $drama_id; ?>" rel="facebox"><span class="glyphicon glyphicon-eye-open" title="View"></span></a>
    &nbsp;</td>
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
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