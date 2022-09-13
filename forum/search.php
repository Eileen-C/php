<?php require_once('Connections/forum.php'); ?>
<?php
$maxRows_rstopic = 3;
$pageNum_rstopic = 0;
if (isset($_GET['pageNum_rstopic'])) {
  $pageNum_rstopic = $_GET['pageNum_rstopic'];
}
$startRow_rstopic = $pageNum_rstopic * $maxRows_rstopic;

$colname_rstopic = "-1";
if (isset($_POST['keyword'])) {
  $colname_rstopic = (get_magic_quotes_gpc()) ? $_POST['keyword'] : addslashes($_POST['keyword']);
}
mysql_select_db($database_forum, $forum);
$query_rstopic = sprintf("SELECT * FROM topic WHERE Title LIKE '%%%s%%' OR Content LIKE '%%%s%%' ORDER BY TopicID DESC", $colname_rstopic,$colname_rstopic);
$query_limit_rstopic = sprintf("%s LIMIT %d, %d", $query_rstopic, $startRow_rstopic, $maxRows_rstopic);
$rstopic = mysql_query($query_limit_rstopic, $forum) or die(mysql_error());
$row_rstopic = mysql_fetch_assoc($rstopic);

if (isset($_GET['totalRows_rstopic'])) {
  $totalRows_rstopic = $_GET['totalRows_rstopic'];
} else {
  $all_rstopic = mysql_query($query_rstopic);
  $totalRows_rstopic = mysql_num_rows($all_rstopic);
}
$totalPages_rstopic = ceil($totalRows_rstopic/$maxRows_rstopic)-1;

$maxRows_rsreply = 3;
$pageNum_rsreply = 0;
if (isset($_GET['pageNum_rsreply'])) {
  $pageNum_rsreply = $_GET['pageNum_rsreply'];
}
$startRow_rsreply = $pageNum_rsreply * $maxRows_rsreply;

$colname_rsreply = "-1";
if (isset($_POST['keyword'])) {
  $colname_rsreply = (get_magic_quotes_gpc()) ? $_POST['keyword'] : addslashes($_POST['keyword']);
}
mysql_select_db($database_forum, $forum);
$query_rsreply = sprintf("SELECT topic.TopicID, topic.Title, reply.Content FROM topic INNER JOIN reply ON topic.TopicID=reply.Reply_TopicID WHERE reply.Content LIKE '%%%s%%' ORDER BY reply.ID DESC", $colname_rsreply);
$query_limit_rsreply = sprintf("%s LIMIT %d, %d", $query_rsreply, $startRow_rsreply, $maxRows_rsreply);
$rsreply = mysql_query($query_limit_rsreply, $forum) or die(mysql_error());
$row_rsreply = mysql_fetch_assoc($rsreply);

if (isset($_GET['totalRows_rsreply'])) {
  $totalRows_rsreply = $_GET['totalRows_rsreply'];
} else {
  $all_rsreply = mysql_query($query_rsreply);
  $totalRows_rsreply = mysql_num_rows($all_rsreply);
}
$totalPages_rsreply = ceil($totalRows_rsreply/$maxRows_rsreply)-1;
function cut200($str){
	$str = strip_tags($str);
	return mb_substr($str,0,200,"utf-8");
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>討論區-search</title>
</head>

<body>
<h1 align="center">討論區</h1>
<table width="500" border="1" align="center">
  <tr>
    <td><a href="index.php">討論區首頁</a> | <a href="javascript:history.back(-1);" >回上一頁</a></td>
  </tr>
</table>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="0" align="center">
    <tr align="right">
      <td>搜尋關鍵字
        <label>
        <input type="text" name="keyword" />
      </label>
        <label>
        <input type="submit" name="Submit" value="送出" />
      </label></td>
    </tr>
  </table>
  
</form>
<?php echo $totalRows_rstopic?>

<?php if ($totalRows_rstopic > 0) { // Show if recordset not empty ?>
<h3 align="center">搜尋結果</h3>
    <?php do { ?>
    <table width="500" border="1" align="center">
      <tr>
        <td bgcolor="#66CCFF"><span><?php echo $row_rstopic['Title']; ?><br /><span align="right"><?php echo $row_rstopic['Time']; ?></span></span></td>z
      </tr>
      <tr>
        <td><?php echo cut200($row_rstopic['Content'])."..."; ?>
          <div align="right"><a href="topic.php?TopicID=<?php echo $row_rstopic['TopicID']; ?>">閱讀這篇主題</a></div>      </td>
      </tr>
    </table>
    <?php } while ($row_rstopic = mysql_fetch_assoc($rstopic)); ?>
	
<?php } // Show if recordset not empty ?>
<?php if ($totalRows_rsreply > 0) { // Show if recordset not empty ?>
  <?php do { ?>
    <table width="500" border="1" align="center">
      <tr>
        <td bgcolor="#66CCFF"><span><?php echo $row_rsreply['Title']; ?></span></td>
      </tr>
      <tr>
        <td>相關回應：<?php echo $row_rsreply['Content']; ?>
          <div align="right"><a href="topic.php?TopicID=<?php echo $row_rsreply['TopicID']; ?>">閱讀這篇主題</a></div></td>
      </tr>
    </table>
    <?php } while ($row_rsreply = mysql_fetch_assoc($rsreply)); ?>
<?php } // Show if recordset not empty ?></body>
</html>
<?php
mysql_free_result($rstopic);

mysql_free_result($rsreply);
?>
