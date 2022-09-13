<?php require_once('Connections/forum.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

if ((isset($_GET['TopicID'])) && ($_GET['TopicID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM topic WHERE TopicID=%s",
                       GetSQLValueString($_GET['TopicID'], "int"));

  mysql_select_db($database_forum, $forum);
  $Result1 = mysql_query($deleteSQL, $forum) or die(mysql_error());
}

if ((isset($_GET['TopicID'])) && ($_GET['TopicID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM reply WHERE Reply_TopicID=%s",
                       GetSQLValueString($_GET['TopicID'], "int"));

  mysql_select_db($database_forum, $forum);
  $Result1 = mysql_query($deleteSQL, $forum) or die(mysql_error());

  $deleteGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['TopicID'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['TopicID'] : addslashes($_GET['TopicID']);
}
mysql_select_db($database_forum, $forum);
$query_Recordset1 = sprintf("SELECT * FROM topic WHERE TopicID = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $forum) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>討論區-deltopic</title>
</head>

<body>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
