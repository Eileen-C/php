<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>0629變數</title>
</head>


<body>
<?php
/*
$name="金城武";
//整數型態可以做四則運算，亦可加""，宣告為字串，則無法做運算
$price=(400+300)/2;
$goods="衣服";
//output金城武花了400元，買了一件衣服，可以用"空格"及"."及","分隔
echo "$name 花了$price 元，買了一件$goods";
echo "<br>";
echo $name."花了".$price."元，買了一件".$goods;
echo "<br>";
echo $name,"花了",$price,"元，買了一件",$goods;
echo "<br>";
$name = "金城武";
$price = 400;
$goods = "衣服";
echo "用連接符號完成的輸出： <br>";
echo $name."花了".$price."元，買了一件".$goods;
echo "<br>用sprintf()完成的輸出：<br>";
echo sprintf("%s花了%d元，買了一件%s",$name,$price,$goods);
*/

/*
//遞增(減)運算子：
$a=5;
echo $a."<br>";
echo $a++."<br>";
echo $a."<br>";
echo ++$a."<br>";
echo "-----------------<br>";
$b=3;
echo $b."<br>";
echo $b--."<br>";
echo $b."<br>";
echo --$b;
*/


//條件敘述
/*
$num = "789";
if($num =="123")
{
  echo "號碼是123";
}
else if ($num =="789")
{
  echo "號碼是789";
}
*/

/*
//自行設一變數$number，判斷此數為奇數或偶數
$number = "5";
if ($number%2 == "0")
{
  echo $number."為偶數";
}
else
{
  echo $number."為奇數";
}

echo "<br>";
$a = "111";
if ($a =="123"){
  echo "號碼是123";
  }
else if ($a =="456"){
  echo "號碼是456";
  }
else{
  echo "號碼不是123，也不是456";
  }
*/


/*if else練習：設一變數$day，透過date("w")，取得星期中的第幾天 (回傳值0~6)
使得每天執行頁面時可看到不同的輸出，output：今天星期三，猴子去爬山
*/
//echo date("Y-m-d H:i:s");
//echo date ("w");

$day = date("w");
/*if ($day == 0)
  {echo "今天星期日，猴子過生日";} 
else if ($day == 1)
  {echo "今天星期一，猴子穿新衣";}  
else if ($day == 2)
  {echo "今天星期二，猴子肚子餓";}  
else if ($day == 3)
  {echo "今天星期三，猴子去爬山";}
else if ($day == 4)
  {echo "今天星期四，猴子去考試";}
else if ($day == 5)
  {echo "今天星期五，猴子去跳舞";}
else
  {echo "今天星期六，猴子去斗六";}*/

//0704 switch
switch($day){
	case '0':
		echo "今天星期日，猴子過生日";
		break;
	case '1':
		echo "今天星期一，猴子穿新衣";
		break;
	case '2':
		echo "今天星期二，猴子肚子餓";
		break;
	case '3':
		echo "今天星期三，猴子去爬山";
		break;
	case '4':
		echo "今天星期四，猴子去考試";
		break;
	case '5':
		echo "今天星期五，猴子去跳舞";
		break;
	case '6':
		echo "今天星期六，猴子去斗六";
		break;
	default:
		echo "輸入錯誤";
		break;
}
?>

</body>
</html>
