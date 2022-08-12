<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php-mySQL</title>
</head>

<body>
<?php
include_once("sqlConn.php");

/*//Create database，建完my_db即可註解此段code
if($con -> query("CREATE DATABASE my_db"))
	echo "database created.";
else
	echo "Error creating database:".$con -> error;*/
	
//Create table
$con -> select_db("my_db");

$sql="
CREATE TABLE persons
(
personID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(personID),
FirstName varchar(15),
LastName varchar(15),
Age int
)";
//Execute query
$con -> query($sql);

$con -> close();
?>
</body>
</html>
