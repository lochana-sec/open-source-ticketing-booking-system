<?php
//To display Text fields
$date=$_GET['date'];
require_once("../include/dbconnection_inc.php");


$sqla="SELECT * FROM time_slot 
WHERE time_slot_id NOT IN(SELECT time_slot_id FROM schedule 
WHERE date='$date')";
$resulta=mysql_query($sqla);
$count=mysql_num_rows($resulta);
if($count!=0){
?>
    <select name="stime[]" id="stime" required="required"
    multiple="multiple" size="2">
     
   <?php while ($rowa=mysql_fetch_array($resulta)) {?> 
    <option value="<?php echo $rowa['time_slot_id']; ?>">
    <?php echo $rowa['description']?></option>
    <?php } ?>
    </select>
<?php } else{	
	echo "<font color='red'><i>Not Available</i></font>";
}
?>

