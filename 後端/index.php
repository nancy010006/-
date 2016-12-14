<?php
require("status.php");
$money=getMoney();
$goodsa=getGoodsA();
$goodsb=getGoodsB();
$goodsc=getGoodsC();
echo "現在金錢:$money<br>商品存貨:<br>";
echo "A:$goodsa<br>";
echo "B:$goodsb<br>";
echo "C:$goodsc<br>";
?>
<a href="controller.php?act=buy">買房子</a>
<a href="controller.php?act=sell">賣東西</a>
<br>
<a href="controller.php?act=transport&store=1&goods=a">送材料A至分店1</a>
<a href="controller.php?act=transport&store=1&goods=b">送材料B至分店1</a>
<a href="controller.php?act=transport&store=2&goods=b">送材料B至分店2</a>
