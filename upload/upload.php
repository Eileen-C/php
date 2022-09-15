<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>upload</title>
</head>

<body>
<h1 align="center">～檔案上傳系統～</h1>
<p align="center">請選擇要上傳的檔案</p>
<form action="add.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div align="center">
    <input name="MAX_FILE_SIZE" type="hidden" id="MAX_FILE_SIZE" value="2000000" />
    <input name="myfile" type="file" />
    <input name="Submit" type="submit" id="submit" value="送出" />
  </div>
</form>

</body>
</html>
