<?php require_once('Connections/upload_conn.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO upload (UserFilename, ServerFilename, `Size`, Comment) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['UserFilename'], "text"),
                       GetSQLValueString($_POST['ServerFilename'], "text"),
                       GetSQLValueString($_POST['Size'], "text"),
                       GetSQLValueString($_POST['comment'], "text"));

  mysql_select_db($database_upload_conn, $upload_conn);
  $Result1 = mysql_query($insertSQL, $upload_conn) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

echo "檔案名稱：".$_FILES['myfile']['name']."<br />";
echo "檔案大小：".$_FILES['myfile']['size']."<br />";
echo "檔案格式：".$_FILES['myfile']['type']."<br />";
echo "暫存名稱：".$_FILES['myfile']['tmp_name']."<br />";
echo "錯誤代碼：".$_FILES['myfile']['error']."<br />";

if($_FILES['myfile']['error'] > 0){
	switch($_FILES['myfile']['error'])
	{
	case 1 : die("檔案大小超出php.ini:upload_max_filesize 限制");
	case 2 : die("檔案大小超出MAX_FILE_SIZE 限制");
	case 3 : die("檔案僅被部分上傳");
	case 4 : die("檔案未被上傳");
	}
}
//判斷暫存檔案是否存在
if(is_uploaded_file($_FILES['myfile']['tmp_name']))
{
	//設定儲存路徑
   $DestDIR = "files";
   if(!is_dir($DestDIR) || !is_writeable($DestDIR))
         die("目錄不存在或無法寫入");

  $File_Extension = explode(".", $_FILES['myfile']['name']); //分割副檔名
  $File_Extension = $File_Extension[count($File_Extension)-1]; //取得副檔名
  $ServerFilename =date("YmdHis"). "." . $File_Extension; //設定serverFile名稱
move_uploaded_file($_FILES['myfile']['tmp_name'] , $DestDIR . "/" . $ServerFilename );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>add</title>
</head>
<body>
<h1 align="center">～檔案上傳系統～</h1>
<form name="form1" action="<?php echo $editFormAction; ?>" method="POST">
  <table width="500" border="1" align="center" cellpadding="0">
    <tr>
      <td width="80">檔案名稱：</td>
      <td width="408"><label>
        <input name="UserFilename" type="text" id="UserFilename" value="<?php echo $_FILES['myfile']['name']; ?>" size="40" readonly="true" />
        </label>
      </td>
    </tr>
    <tr>
      <td>檔案大小：</td>
      <td><label>
        <input name="Size" type="text" id="Size" value="<?php echo $_FILES['myfile']['size']; ?>" size="40" />
        </label>
      </td>
    </tr>
    <tr>
      <td>檔案註解：</td>
      <td><textarea name="comment" style="width:400px">&nbsp;</textarea></td>
    </tr>
    <tr>
      <td><input name="ServerFilename" type="hidden" id="ServerFilename" value="<?php echo $ServerFilename; ?>" /></td>
      <td align="right"><input type="submit" name="Submit" value="送出" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>
