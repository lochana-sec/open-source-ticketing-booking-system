<link rel="stylesheet" href="../css/layout.css" type="text/css" />


<?php
if(!isset($_SESSION)){ session_start(); } //if session is not started then start it.


?>

<table align="right" style="margin-right:20px" bgcolor="white"><tr><td>
<img src="../images/Recruit.png" width="50" height="auto" />
</td>
<td>
<?PHP echo $_SESSION['username']." (".$_SESSION['user_role_name'].")"; ?>&nbsp;
<a href="../login/logout.php">Logout</a>
</td>
</tr>
</table>
