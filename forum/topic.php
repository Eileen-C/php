<?php require_once('Connections/forum.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_GET['TopicID'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['TopicID'] : addslashes($_GET['TopicID']);
}
mysql_select_db($database_forum, $forum);
$query_Recordset1 = sprintf("SELECT * FROM topic WHERE TopicID = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $forum) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['TopicID'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['TopicID'] : addslashes($_GET['TopicID']);
}
mysql_select_db($database_forum, $forum);
$query_Recordset2 = sprintf("SELECT * FROM reply WHERE Reply_TopicID = %s ORDER BY ID ASC", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $forum) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>討論區-topic</title>
</head>

<body>
<h1 align="center">討論區</h1>
<table width="500" border="1" align="center" cellpadding="0">
  <tr>
    <td width="150"><a href="index.php">討論區首頁</a></td>
    <td width="338" align="right"><a href="post.php">發表主題</a> | <a href="search.php">搜尋</a></td>
  </tr>
</table>
<table width="500" border="1" align="center" cellpadding="0">
  <tr>
    <td width="388">主題：<?php echo $row_Recordset1['Title']; ?></td>
    <td width="100" align="center"><a href="reply.php?TopicID=<?php echo $row_Recordset1['TopicID']; ?>">回覆主題</a></td>
  </tr>
</table>
<table width="500" border="1" align="center" cellpadding="0">
  <tr>
    <td width="88" align="center" bgcolor="#66CCFF"><strong>發表人</strong></td>
    <td width="400" align="center" bgcolor="#66CCFF"><strong>內容</strong></td>
  </tr>
  <tr>
    <td rowspan="2" align="center"><?php echo $row_Recordset1['Nickname']; ?><br />
    <img src="img/icon_delete.gif" alt="del" width="15" height="18" /><img src="img/icon_email.gif" alt="email" border="0" /></td>
    <td style="text-indent:2em"><?php echo $row_Recordset1['Content']; ?></td>
  </tr>
  <tr>
    <td align="right">發表時間：<?php echo $row_Recordset1['Time']; ?></td>
  </tr>
</table>
<?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
  <table width="500" border="1" align="center" cellpadding="0">
    <tr>
      <td width="88" align="center" bgcolor="#66CCFF"><strong>發表人</strong></td>
      <td width="400" align="center" bgcolor="#66CCFF"><strong>內容</strong></td>
    </tr>
    <?php do { ?>
      <tr>
        <td rowspan="2" align="center"><?php echo $row_Recordset2['Nickname']; ?><br />
          <img src="img/icon_delete.gif" alt="del" width="15" height="18" /><img src="img/icon_email.gif" alt="email" /></td>
        <td style="text-indent:2em"><?php echo $row_Recordset2['Content']; ?></td>
      </tr>
      <tr>
        <td align="right">發表時間：<?php echo $row_Recordset2['Time']; ?></td>
      </tr>
      <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
      </table>
  <?php } // Show if recordset not empty ?></body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
