
<?php
require_once("../include/dbconnection_inc.php");


$sqldrama="SELECT * FROM drama ORDER BY drama_name";
$resultdrama=mysql_query($sqldrama);

$sqltime="SELECT * FROM time_slot";
$resulttime=mysql_query($sqltime);

$cur_date=date("Y-m-d");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="../css/layout.css" />

<script language="Javascript" type="text/javascript"> 
 
        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
		</script>
<script type="text/javascript" src="../js/ajax.js"></script>
</head>

<body>

<form method="post" action="addscheduleprocess.php">
<table width="500" border="0" align="center">
  <tr>
    <td colspan="3" class="but"> <h4 align="center">Drama Schedule </h4></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="32%" height="67">Date</td>
    <td colspan="2">
 <input type="date" name="sdate" id="sdate"
  min="<?php echo $cur_date;?>" required="required" 
  onchange="loadShowTime(this.value)"></td>
  </tr>
  
  <tr>
    <td height="40">Show Time</td>
    <td colspan="2">
    <div id="showt">
    <select name="stime[]" id="stime" required="required"
    multiple="multiple" size="2">
     
   <?php while ($rowtime=mysql_fetch_array($resulttime)) {?> 
    <option value="<?php echo $rowtime['time_slot_id']; ?>">
    <?php echo $rowtime ['description']?></option>
    <?php } ?>
    </select>
    </div>
     <!-- <option value="">select show time</option>
        <option value="3-5">3pm to 5pm</option>
        <option value="Education">6pm to 8pm</option>
      </select> -->
      </td><td width="1%"></td>
  </tr>
  <tr>
    <td height="35">Drama Name</td>
    <td colspan="2"><select name="dname" required="required">
<option value="">Select a Drama </option>
<?php while($rowdrama=mysql_fetch_array($resultdrama)){?>
<option value="<?php echo $rowdrama['drama_id']; ?>">
 <?php echo $rowdrama['drama_name']; ?></option>
<?php }?>

</select></td>
  </tr>
  <tr>
    <td height="36" colspan="3"><h4 align="center">Ticket Price </h4></td>
  </tr>
  <tr>
    <td height="42">Gallery</td>
    <td width="26%">
    <input name="gaprice" type="text" id="gaprice"  onKeyPress="return onlyNos(event,this);" size="5"
    maxlength="5" required="required" /> </td>
    <td width="41%">Adult</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><input name="gcprice" type="text" id="gcprice" 
    maxlength="5" 
    required="required" onKeyPress="return onlyNos(event,this);" size="5" ></td>
    <td>Child</td>
  </tr>
  <tr>
    <td height="39">Balcony</td>
    <td><input name="baprice" type="text" id="baprice"
    maxlength="5" 
    required="required" onKeyPress="return onlyNos(event,this);" size="5" ></td>
    <td>Adult</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><input name="bcprice" required="required"
    maxlength="5" type="text" id="bcprice" onKeyPress="return onlyNos(event,this);" size="5" ></td>
    <td>Child</td>
  </tr>
  <tr>
    <td height="35" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">
  <button type="submit" name="save" id="save"  class="btn but">
   <span class="glyphicon glyphicon-saved"></span> Save
    </button>
    </td>
  </tr>
  
</table>
</form>
</body>
</html>