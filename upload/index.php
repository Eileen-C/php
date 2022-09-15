<?php require_once('Connections/upload_conn.php'); ?>
<?php
mysql_select_db($database_upload_conn, $upload_conn);
$query_rs_upload = "SELECT * FROM upload ORDER BY ID DESC";
$rs_upload = mysql_query($query_rs_upload, $upload_conn) or die(mysql_error());
$row_rs_upload = mysql_fetch_assoc($rs_upload);
$totalRows_rs_upload = mysql_num_rows($rs_upload);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>檔案上傳系統-index</title>
</head>

<body>
<h1 align="center">檔案上傳系統</h1>
<hr />
<table align="center" width="500" border="1" cellpadding="0">
  <tr>
	<td align="right"><a href="upload.php">新增檔案</a></td>
  </tr>
</table>
<table width="500" border="1" align="center" cellpadding="0">
  <?php do { ?>
    <tr>
      <td width="50">名稱：</td>
      <td width="190"><?php echo $row_rs_upload['UserFilename']; ?></td>
      <td width="50">大小</td>
      <td width="80"><?php echo $row_rs_upload['Size']; ?></td>
      <td width="106" align="right">下載 | 刪除</td>
    </tr>
    <tr>
      <td>說明：</td>
      <td colspan="4"><?php echo $row_rs_upload['Comment']; ?></td>
    </tr>
    <?php } while ($row_rs_upload = mysql_fetch_assoc($rs_upload)); ?>
</table>


</body>
</html>
<?php
mysql_free_result($rs_upload);
?>
