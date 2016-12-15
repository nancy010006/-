<?php
require("dbconnect.php");
mysql_select_db("Test");
mysql_query("set names utf8");
$data=mysql_query("select * from store");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料庫網頁建置</title>
<style type="text/css">
            body {
            background-image:url(HelloKitty_003013.jpg);
            background-repeat:repeat;
            }
			#Branch{
				position: absolute;	
				border: 15px groove #630;
				padding: 30px;
				background-color: white;
			}
			#pass{
				position: absolute;	
				border: 15px groove #630;
				padding: 30px;
				background-color: white;
				top:300px;
			}
			.a1 {
				width: 50px;
			}
			.a2 {
				width: 50px;
			}
			.a3 {
				width: 50px;
			}
			.a4 {
				width: 80px;
			}
			table {
				text-align:center
			}
        </style>
</head>

<body>
<div id="Branch">
<table >
	<tr>
    <td >分店編號</td>
	<td >開店狀態</td>
    <td rowspan="5" class="text">上<br/>限<br/>庫<br/>存</td>
    <td ><img id="麵包" src="1.png" class="a1" /></td>
    <td ><img id="冰淇淋" src="2.png" class="a2" /></td>
    <td ><img id="飲料" src="3.png" class="a3" /></td>
	<td rowspan="5" class="text">目<br/>前<br/>庫<br/>存</td>
	<td ><img id="麵包" src="1.png" class="a1" /></td>
    <td ><img id="冰淇淋" src="2.png" class="a2" /></td>
    <td ><img id="飲料" src="3.png" class="a3" /></td>
  </tr>
  <?php
	$a=rand(1,10);
    for($i=1;$i<=mysql_num_rows($data);$i++){
	$rs=mysql_fetch_row($data);
	$nowtime = date("s");
	echo $nowtime;
	if ($nowtime == 00 || $nowtime == 10 || $nowtime == 20 || $nowtime == 30 || $nowtime == 40 || $nowtime == 50){
		$rs[7]=$rs[7]-$a;
		$rs[8]=$rs[8]-$a;
		$rs[9]=$rs[9]-$a;
        $sql = "UPDATE guestbook 
        SET goodsa= '$rs[7]', goodsb='$rs[8]', goodsc='$rs[9]' 
        WHERE uid='$uid'";
        return mysqli_query($conn, $sql);
	}
	if($rs[1]==0){
		$rs[3]="X";
		$rs[4]="X";
		$rs[5]="X";
		$rs[1]="否";
		$rs[6]="X";
		$rs[7]="X";
		$rs[8]="X";
	}else {
		$rs[1]="是";
	}
?>
  <tr>
    <td><?php echo $rs[0]?></td>
	<td><?php echo $rs[1]?></td>
    <td><?php echo $rs[3]?></td>
    <td><?php echo $rs[4]?></td>
    <td><?php echo $rs[5]?></td>
	<td><?php echo $rs[6]?></td>
    <td><?php echo $rs[7]?></td>
    <td><?php echo $rs[8]?></td>
  </tr>
  
  <?php
}
?>
</table>
</div>
<div id="pass">
<form method="post" action="Shipments.php">
<table>
	<tr><td><center>庫存出貨</center></td></tr>
	<tr>
	<td><center>
	分店  <input type="text" name="bread"placeholder="分店編號"required/ /></br>
	<img id="麵包" src="1.png" class="a1" /><input type="text" name="bread"placeholder="最少數量為0" required/ />樣</br>
	<img id="冰淇淋" src="2.png" class="a2" /><input type="text" name="ice" placeholder="最少數量為0" required/ />樣</br>	
	<img id="飲料" src="3.png" class="a3" /><input type="text" name="drink" placeholder="最少數量為0" required/ />樣</br>
	</center></td></tr>
	<tr><td><img id="運送" src="2.gif" class="a4"/><input type ="submit" value ="開始運送"><input type="reset"value="數量重設">
	</td></tr>
	</table>
</table>
</form>
</div>
</body>
</html>