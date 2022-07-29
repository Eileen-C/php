<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php 0718 SESSION</title>
</head>

<body>
<?php
/*	echo "請用session完成下列要求：<br>
	設計一網頁可用來計數，使用者到訪網頁的次數<br>
	output:歡迎您第n次造訪～<br>
	----------------------------------------------------<br>";
	session_start();
	if(!isset($_SESSION['visit'])){
		$_SESSION['visit'] = 1;
	} 
	else{
		$_SESSION['visit']++;
	}
	echo("歡迎您第".$_SESSION['visit']."次造訪！<br>");
	
	if(isset($_SESSION['count'])){
		$_SESSION['count']++;
	}
	else{
		$_SESSION['count']=1;
	}
	echo("歡迎您第".$_SESSION['count'].次造訪～);
	
	//刪除所有SESSION資料
	//session_destroy();*/
			  
?>

<!--用A方法送，就要用A方法接收。例外：request-->
<form action="php0718-2.php" method="get">
  姓名
  <label>
  <input type = "text" size="6" name="yourname"/>  
  </label>
  
  <p>男
  <label>
  <input name="sex" type="radio" value="male" />
  </label>
  
  女
  <label>
  <input name="sex" type="radio" value="female" />
  </label>
  </P>
  
  <p><label>
  	<input type="submit" name="Submit" value="送出" />
  </label></p>  
</form>

<form action="php0718.php" method="post">
Num1：
<label>
<input name="num1" type="text" id="num1" value="" />
</label>
Num2:
<label>
<input name="num2" type="text" id="num2" value="" />
</label>
<p>運算：	
	<label>
	<input name="calculate" type="radio" value="+" />
	</label>加
	
	<label>
	<input name="calculate" type="radio" value="-" />
	</label>減
	
	<label>
	<input name="calculate" type="radio" value="*" />
	</label>乘
	
	<label>
	<input name="calculate" type="radio" value="/" />
	</label>除
</p>

<p><label>
	<input type="submit" name="Submit" value="送出" />
</label>
<label>
	<input type="reset" value="重新填寫">
</label></p>
</form>


<?php
	$num1=$_POST['num1'];
	$num2=$_POST['num2'];
	$calculate=$_POST['calculate'];
	
	switch($calculate){
		case '+':
			$result=$num1+$num2;
			break;
		case '-':
			$result=$num1-$num2;
			break;
		case '*':
			$result=$num1*$num2;
			break;
		case '/':
			$result=$num1/$num2;
			break;
	}
	echo $num1.$calculate.$num2."=".$result;
?>

</body>
</html>
