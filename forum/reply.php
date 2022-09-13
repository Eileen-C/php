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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO reply (Reply_TopicID, Content, Nickname, Email, `Time`) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Reply_TopicID'], "int"),
                       GetSQLValueString($_POST['Content'], "text"),
                       GetSQLValueString($_POST['NickName'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Time'], "date"));

  mysql_select_db($database_forum, $forum);
  $Result1 = mysql_query($insertSQL, $forum) or die(mysql_error());

  $insertGoTo = "topic.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>討論區-reply</title>
<script src="./tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
  selector: 'textarea#mytextarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
    </script>
</head>

<body>
<h1 align="center">討論區(回應資料)</h1>
<hr />
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="500" border="1" align="center">
    <tr>
      <td>暱稱:
        <label>
        <input name="NickName" type="text" id="NickName" />
      </label></td>
      <td>email:
        <label>
        <input name="Email" type="text" id="Email" />
      </label></td>
    </tr>
    <tr>
      <td height="68" colspan="2"><label>
        <textarea name="Content" id="mytextarea"></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><input name="Time" type="hidden" id="Time" value="<?php echo date("Y:m:d H:i:s"); ?>" />
        <label>
        <input type="submit" name="Submit" value="送出" /><input name="Reply_TopicID" type="hidden" value="<?php echo $_GET['TopicID']; ?>" />
      </label></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>
