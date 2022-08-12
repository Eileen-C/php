<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Into</title>
</head>

<body>
<?php
include_once("sqlConn.php");
$con -> select_db("my_db");

$con -> query("INSERT INTO persons(personID, FirstName, LastName, Age)
			VALUES('1', 'Peter', 'Griffin', '35')");
$con -> query("INSERT INTO persons(personID, FirstName, LastName, Age)
			VALUES('2', 'Gleen', 'Quagmire', '33')");
$con -> close();
?>
</body>
</html>
