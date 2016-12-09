<?php
require("status.php");
$result=getMoney();
$rs=mysqli_fetch_assoc($result);
$money=$rs['money'];
echo "現在金錢:$money<br>";
?>
<a href="controller.php?act=buy">買房子</a>
<br>
<a href="controller.php?act=transport&store=1&goods=a">送材料A至分店1</a>
<a href="controller.php?act=transport&store=1&goods=b">送材料B至分店1</a>
<a href="controller.php?act=transport&store=2&goods=b">送材料B至分店2</a>
