<?php $color = array("blue", "green", "red", "orange", "yellow");
$rand_background = $color[rand(0, 4)];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>0704 迴圈</title>

</head>

<body bgcolor="<?php echo $color[rand(0,4)]; ?>">
<?php
//迴圈

/*echo"請使用for找出1~200之間可以被7及9整除的數<br>" ;

for($i=1;$i<=200;$i++){
	if($i%7==0 && $i%9==0){
		echo $i."<br>";}
}
echo "請使用for找出1~200之間可以被7或9整除的數.<br>";
for($a=1;$a<=200;$a++){
	if($a%7==0 || $a%9==0){
		echo $a."<br>";}
}*/

/*echo "請使用while，設計一抽彩票程式，抽出彩金從0~10元不等，可以一直重複抽下去，直到抽中0元就不能再抽<br>
ans：<br>抽中2元，累計2元<br>抽中3元，累計5元<br>抽中0元，累計n元<br>------<br>";

$m = 1; //不能使用rand，否則為0時則不會執行
while ($m != 0){
 $m= rand(0,10);
 $sum += $m;
 echo "抽中".$m."元，累計".$sum."元<br>";
 }
 
echo "------<br>使用do~while<br>"; 
do {
 $n= rand(0,10);
 $sun += $n; //$sun=$sun+$n
 echo "抽中".$n."元，累計".$sun."元<br>";
 }while ($n != 0)*/

//陣列
echo"[array]設一陣列color裡面存放5個字串blue, green, red, orange, yellow<br>
請設計一網頁，使得每次執行時背景會隨機產生<br>
提示rand(min,max)<br>";
echo "在body前宣告變數color = array(blue, green, red, orange, yellow);變數rand_background = 變數color[rand(0, 4)];";
?>
</body>
</html>
