<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php-mySQL</title>
<style>
th{
bgcolor: #3399FF
}
</style>

</head>

<body>
<?php
include_once("sqlConn.php");
$con -> select_db("my_db");

$result = $con -> query("SELECT * FROM persons");

echo "
<a href = \"add.php\">New Record</a>
<table border = '1'>
<tr>
<th>personID</th>
<th>FirstName</th>
<th>LastName</th>
<th>Age</th>
<th>Update</th>
<th>Delete</th>
</tr>
";

while ($row = $result -> fetch_array()){
	echo "<tr>";
	echo "<td>".$row['personID']."</td>";
	echo "<td>".$row['FirstName']."</td>";
	echo "<td>".$row['LastName']."</td>";
	echo "<td>".$row['Age']."</td>";
	echo "<td><a href = \"update.php?id=$row[personID]\">UPDATE</a></td>";
	echo "<td><a href = \"del.php?id=$row[personID]\" onclick=\"return confirm('確認是否要刪除？')\">DELETE</a></td>";
	echo "</tr>";
}
echo "</table>";

$con -> close();

?>
</body>
</html>

