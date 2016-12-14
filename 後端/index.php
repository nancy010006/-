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
<form action='controller.php' method='post'>
分店一
貨物a<input name='goodsa' type='text'>
貨物b<input name='goodsb' type='text'>
貨物c<input name='goodsc' type='text'>
<input type='hidden' name='act' value='transport'>
<input type='hidden' name='store' value='1'>
<input type='submit'>
</form>
<form action='controller.php' method='post'>
分店二
貨物a<input name='goodsa' type='text'>
貨物b<input name='goodsb' type='text'>
貨物c<input name='goodsc' type='text'>
<input type='hidden' name='act' value='transport'>
<input type='hidden' name='store' value='2'>
<input type='submit'>
</form>
<form action='controller.php' method='post'>
分店三
貨物a<input name='goodsa' type='text'>
貨物b<input name='goodsb' type='text'>
貨物c<input name='goodsc' type='text'>
<input type='hidden' name='act' value='transport'>
<input type='hidden' name='store' value='3'>
<input type='submit'>
</form>
<form action='controller.php' method='post'>
分店四
貨物a<input name='goodsa' type='text'>
貨物b<input name='goodsb' type='text'>
貨物c<input name='goodsc' type='text'>
<input type='hidden' name='act' value='transport'>
<input type='hidden' name='store' value='4'>
<input type='submit'>
</form>
