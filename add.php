<?php
include_once("sqlConn.php");
$con -> select_db("my_db");

if(isset($_POST['button'])){
$sql="INSERT INTO persons(FirstName, LastName, Age) 
VALUES('$_POST[FirstName]', '$_POST[LastName]', '$_POST[Age]')";
$con->query($sql);
header("Location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>add</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="add.php" >
	<table width="400" border="1" align="center">
  		<tr align="center">
    		<td bgcolor="#3399FF">FirstName</td>
    		<td bgcolor="#3399FF">LastName</td>
    		<td bgcolor="#3399FF">Age</td>
  		</tr>
  		<tr>
    		<td>
				<label for="textfield"></label>
				<input type="text" name="FirstName" id="FirstName" />			
			</td>
    		<td>
				<label for="textfield2"></label>
				<input type="text" name="LastName" id="LastName" />			
			</td>
    		<td>
				<label for="textfield3"></label>
				<input type="text" name="Age" id="Age" size="10" />			
			</td>
  		</tr>
 		<tr>
    		<td colspan="3" align="center"><input type="submit"  name="button" id="button" value="送出" /></td>
   		</tr>
  </table>
</form>
</body>
</html>
