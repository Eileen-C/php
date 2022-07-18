<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php12</title>
</head>

<body>
<form action="php12-2.php" method="post">
<table width="332" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="53">姓名：</td>
    <td width="270">
		<label>
  			<input type = "text" size="6" name="yourname"/>  
  		</label>
	</td>
  </tr>
  <tr>
    <td>性別：</td>
    <td>
	<input name="sex" type="radio" value="male" />男
	<input name="sex" type="radio" value="female" />女
	</td>
  </tr>
  <tr>
    <td>生日：</td>
    <td><label>
		<select name="yy">
		<?php
			for($i=1901;$i<2023;$i++)
				echo "<option value=\"$i\">$i</option>"
		?>
		</select>年
		<select name="mm">
		<?php
			for($a=1;$a<13;$a++)
				echo "<option value=\"$a\">$a</option>"
		?>
		</select>月
		<select name="dd">
		<?php
			for($b=1;$b<32;$b++)
				echo "<option value=\"$b\">$b</option>"
		?>
		</select>日
	  </label></td>
  </tr>
  <tr>
    <td>興趣：</td>
    <td><label>
		<input name="hobbies[]" type="checkbox" value="打球" />打球
		<input name="hobbies[]" type="checkbox" value="聽音樂" />聽音樂
		<input name="hobbies[]" type="checkbox" value="閱讀" />閱讀
		<input name="hobbies[]" type="checkbox" value="游泳" />游泳
	</label></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
		<label>
  		<input type="submit" name="Submit" value="送出" />
  		</label>
	</td>
  </tr>
</table>

</form>
</body>
</html>
