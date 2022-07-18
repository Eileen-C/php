<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php12-2</title>
</head>

<body>
<table width="683" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="268" height="50" align="center">
	<?php
		if($_POST['sex']=='male'){
			echo "<img src = './male.png' width=50/>";
			}
		else{
			echo "<img src = './female.jpg' width=50/>";
		}
	?>	</td>
    <td width="409" align="center">
	<?php echo "姓名：".$_POST['yourname']
	?>	</td>
  </tr>
  <tr>
    <td height="50" align="center">
	<?php echo "生日：".$_POST['yy']."年".$_POST['mm']."月".$_POST['dd']."日"
	?>	
	</td>
    <td align="center">
	<?php 
		foreach($_POST['hobbies'] as $val)
			echo $val."<br>";
	?>
	</td>
  </tr>
</table>

</body>
</html>
