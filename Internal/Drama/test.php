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

$maxRows_Recordset1 = 2;
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
<?php echo $totalRows_Recordset1 ?>
<p>&nbsp;</p>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<table border="0">
  <tr>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">First</a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Previous</a>
      <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Next</a>
      <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">Last</a>
      <?php } // Show if not last page ?></td>
  </tr>
</table>
Records <?php echo ($startRow_Recordset1 + 1) ?> to <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> of <?php echo $totalRows_Recordset1 ?>
</p>


<p>&nbsp;
<table border="1" align="center">
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
<br>
