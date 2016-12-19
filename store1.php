<?php
require("dbconnect.php");
require("status.php");
mysql_select_db("se");
mysql_query("set names utf8");
$data=mysql_query("select * from store");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料庫網頁建置</title>
<script type="text/javascript" src="jquery.js"></script>


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
			#st{
				position: absolute;	
				border: 15px groove #630;
				padding: 30px;
				background-color: white;
				left:500px;
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
    <td>分店編號</td>
	<td>開店狀態</td>
	<td rowspan="5" class="text">目<br/>前<br/>庫<br/>存</td>
	<td ><img id="麵包" src="1.png" class="a1" /></td>
    <td ><img id="冰淇淋" src="2.png" class="a2" /></td>
    <td ><img id="飲料" src="3.png" class="a3" /></td>
	<td rowspan="5" class="text">上<br/>限<br/>庫<br/>存</td>
	<td ><img id="麵包" src="1.png" class="a1" /></td>
    <td ><img id="冰淇淋" src="2.png" class="a2" /></td>
    <td ><img id="飲料" src="3.png" class="a3" /></td>
  </tr>
	<tr>
	<td>1</td>
	<td><?php 
			if (getStoreStatus(1)==1)
				echo "是";
			else 
				echo "否";?></td>
	<td><?php if (getStoreStatus(1)==0)
				echo "X";
			else 
				echo getOtherGoodsA(1)?></td>
	<td><?php  if (getStoreStatus(1)==0)
				echo "X";
			else 
				echo getOtherGoodsB(1)?></td>
	<td><?php  if (getStoreStatus(1)==0)
				echo "X";
			else 
				echo getOtherGoodsC(1)?></td>
	<td><?php  if (getStoreStatus(1)==0)
				echo "X";
			else 
				echo getotherstockA(1)?></td>
	<td><?php  if (getStoreStatus(1)==0)
				echo "X";
			else 
				echo getotherstockB(1)?></td>
	<td><?php  if (getStoreStatus(1)==0)
				echo "X";
			else 
				echo getotherstockC(1)?></td>			
	</tr>
	<tr>
	<td>2</td>
	<td><?php 
			if (getStoreStatus(2)==1)
				echo "是";
			else 
				echo "否";?></td>
	<td><?php if (getStoreStatus(2)==0)
				echo "X";
			else 
				echo getOtherGoodsA(2)?></td>
	<td><?php if (getStoreStatus(2)==0)
				echo "X";
			else 
				echo getOtherGoodsB(2)?></td>
	<td><?php 
			  if (getStoreStatus(2)==0)
				echo "X";
			else 
				echo getOtherGoodsC(2)?></td>
	<td><?php  if (getStoreStatus(2)==0)
				echo "X";
			else 
				echo getotherstockA(2)?></td>
	<td><?php  if (getStoreStatus(2)==0)
				echo "X";
			else 
				echo getotherstockB(2)?></td>
	<td><?php  if (getStoreStatus(2)==0)
				echo "X";
			else 
				echo getotherstockC(2)?></td>

	</tr>
	<tr>
	<td>3</td>
	<td><?php 
			if (getStoreStatus(3)==1)
				echo "是";
			else 
				echo "否";?></td>
	<td><?php  if (getStoreStatus(3)==0)
				echo "X";
			else 
				echo getOtherGoodsA(3)?></td>
	<td><?php  if (getStoreStatus(3)==0)
				echo "X";
			else 
				echo getOtherGoodsB(3)?></td>
	<td><?php  if (getStoreStatus(3)==0)
				echo "X";
			else 
				echo getOtherGoodsC(3)?></td>
	<td><?php  if (getStoreStatus(3)==0)
				echo "X";
			else 
				echo getotherstockA(3)?></td>
	<td><?php  if (getStoreStatus(3)==0)
				echo "X";
			else 
				echo getotherstockB(3)?></td>
	<td><?php  if (getStoreStatus(3)==0)
				echo "X";
			else 
				echo getotherstockC(3)?></td>
	</tr>
	<tr>
	<td>4</td>
	<td><?php 
			if (getStoreStatus(4)==1)
				echo "是";
			else 
				echo "否";?></td>
	<td><?php  if (getStoreStatus(4)==0)
				echo "X";
			else 
				echo getOtherGoodsA(4)?></td>
	<td><?php  if (getStoreStatus(4)==0)
				echo "X";
			else 
				echo getOtherGoodsB(4)?></td>
	<td><?php  if (getStoreStatus(4)==0)
				echo "X";
			else 
				echo getOtherGoodsC(4)?></td>
	<td><?php  if (getStoreStatus(4)==0)
				echo "X";
			else 
				echo getotherstockA(4)?></td>
	<td><?php  if (getStoreStatus(4)==0)
				echo "X";
			else 
				echo getotherstockB(4)?></td>
	<td><?php  if (getStoreStatus(4)==0)
				echo "X";
			else 
				echo getotherstockC(4)?></td>						
	</tr>
</table>
</div>
<div id="pass">
<form method="post" action="controller.php">
  <input type="hidden" name="act" value="transport">
	<table>
	<tr><td><center>庫存出貨</center></td></tr>
	<tr>
	<td><center>
	分店  <input type="text" name="store" id="store" placeholder="分店編號" required/ /></br>
	<img id="麵包" src="1.png" class="a1" /><input type="text" name="goodsa" placeholder="最少數量為0" required/ />樣</br>
	<img id="冰淇淋" src="2.png" class="a2" /><input type="text" name="goodsb" placeholder="最少數量為0" required/ />樣</br>	
	<img id="飲料" src="3.png" class="a3" /><input type="text" name="goodsc" placeholder="最少數量為0" required/ />樣</br>
	</center></td></tr>
	<tr><td><img id="運送" src="2.gif" class="a4"/><input type ="submit" value ="開始運送"><input type="reset"value="數量重設">
	</td></tr>
	</table>
</table>
</form>
</div>
</body>
</html>