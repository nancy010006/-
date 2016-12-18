<?php
require("status.php");
$money=getMoney();
$goodsa=getGoodsA();
$goodsb=getGoodsB();
$goodsc=getGoodsC();
$day=getday();
$CostA=getcost('a');
$CostB=getcost('b');
$CostC=getcost('c');
$PriceA=getprice('a');
$PriceB=getprice('b');
$PriceC=getprice('c');
$NowA1=getOtherGoodsA(1); $MaxA1=getotherstockA(1);
$NowB1=getOtherGoodsB(1); $MaxB1=getotherstockB(1);
$NowC1=getOtherGoodsC(1); $MaxC1=getotherstockC(1);
$NowA2=getOtherGoodsA(2); $MaxA2=getotherstockA(2);
$NowB2=getOtherGoodsB(2); $MaxB2=getotherstockB(2);
$NowC2=getOtherGoodsC(2); $MaxC2=getotherstockC(2);
$NowA3=getOtherGoodsA(3); $MaxA3=getotherstockA(3);
$NowB3=getOtherGoodsB(3); $MaxB3=getotherstockB(3);
$NowC3=getOtherGoodsC(3); $MaxC3=getotherstockC(3);
$NowA4=getOtherGoodsA(4); $MaxA4=getotherstockA(4);
$NowB4=getOtherGoodsB(4); $MaxB4=getotherstockB(4);
$NowC4=getOtherGoodsC(4); $MaxC4=getotherstockC(4);
?>
<!DOCTYPE HTML>
<!--
    Epilogue by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>
        <title>Bread Shop</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body onload='countdown("sell")'>
        <!-- Header -->
            <header id="header" class="alt">
                <div class="inner">
                    <h1>Bread Shop</h1>
                    <p>The Taste of Happiness</p>
                </div>
            </header>
<form id='sell' action='controller.php' method='post'>
<input type='hidden' name='act' value='sell'>
</form>
        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Banner -->
                    <section id="intro" class="main">
                        <div id=gold>
                            <h2><img src="images/gold.jpg" width="50" height="50">現有金幣：<?php echo $money ?><div id='count'>1</div></h2>
                            <?php echo "<h1>第 $day 天</h1>"?>
                        </div>
                        <div id=stock>
                            <h2><img src="images/store.jpg" width="50" height="50">總店庫存</h2>
                                <ul style="list-style-type:none">
                                    <li><img src="images/1.png" width="50" height="50">：<?php echo $goodsa ?></li>
                                    <li><img src="images/2.png" width="50" height="50">：<?php echo $goodsb ?></li>
                                    <li><img src="images/3.png" width="50" height="50">：<?php echo $goodsc ?></li>
                                </ul>
                            <h2><img src="images/buy.png" width="50" height="50">總店進貨</h2>
                                <form action='controller.php' method='post'>
                                <input type='hidden' name='act' value='callorder'>
                                <table id=buystock border="0">
                                    <tr>
                                        <td>
                                            <?php echo "<img src='images/1.png' width='50' height='50'> 單價:$CostA"?>
                                        </td>
                                        <td>
                                            <?php echo "<img src='images/2.png' width='50' height='50'> 單價:$CostB"?>
                                        </td>
                                        <td>
                                            <?php echo "<img src='images/3.png' width='50' height='50'> 單價:$CostC"?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="howmuch" name="accounta" size="8" maxlength="20" placeholder="進貨數量" />
                                        </td>
                                        <td>
                                            <input type="text" id="howmuch" name="accountb" size="8" maxlength="20" placeholder="進貨數量" />
                                        </td>
                                        <td>
                                            <input type="text" id="howmuch" name="accountc" size="8" maxlength="20" placeholder="進貨數量" />
                                        </td>
                                    </tr>

                                </table>
                                <input type='submit'>
                                </form>
                                <h2><img src="images/buy.png" width="50" height="50">總店送貨</h2>
                                <form action='controller.php' method='post'>
                                <input type='hidden' name='act' value='transport'>
                                <table id=buystock border="0">
                                    <tr>
                                        <td>
                                            <span style="font-weight:bold;">選擇分店</span>
                                        </td>
                                        <td>
                                            <img src='images/1.png' width='50' height='50'>
                                        </td>
                                        <td>
                                            <img src='images/2.png' width='50' height='50'>
                                        </td>
                                        <td>
                                            <img src='images/3.png' width='50' height='50'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="howmuch" name="store" size="8" maxlength="20"  placeholder="分店編號" />
                                        </td>
                                        <td>
                                            <input type="text" id="howmuch" name="goodsa" size="8" maxlength="20" placeholder="進貨數量" />
                                        </td>
                                        <td>
                                            <input type="text" id="howmuch" name="goodsb" size="8" maxlength="20" placeholder="進貨數量" />
                                        </td>
                                        <td>
                                            <input type="text" id="howmuch" name="goodsc" size="8" maxlength="20" placeholder="進貨數量" />
                                        </td>
                                    </tr>

                                </table>
                                <input type='submit'>
                                </form>
                            <h2><img src="images/list.png" width="50" height="50">查看訂單狀態</h2>
                                <ul class="actions">
                                    <li><a href="list.php" class="button big">查看現有訂單</a></li>
                                </ul>
                        </div>
                    </section>

                <!-- Items -->
                    <section class="main items">
                        <article class="item">
                            <header>
                                <a><img src="images/shop2.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                            <?php
                                    if(getStoreStatus(1)==1){
                                        echo "<table>
                                                  <tr>
                                                      <td>
                                                      </td>
                                                      <td>
                                                          <img src='images/1.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/2.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/3.png' width='50' height='50'>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          產品售價
                                                      </td>
                                                      <td>
                                                          $PriceA
                                                      </td>
                                                      <td>
                                                          $PriceB
                                                      </td>
                                                      <td>
                                                          $PriceC
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          目前庫存
                                                      </td>
                                                      <td>
                                                          $NowA1
                                                      </td>
                                                      <td>
                                                          $NowB1
                                                      </td>
                                                      <td>
                                                          $NowC1
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          庫存上限
                                                      </td>
                                                      <td>
                                                          $MaxA1
                                                      </td>
                                                      <td>
                                                          $MaxB1
                                                      </td>
                                                      <td>
                                                          $MaxC1
                                                      </td>
                                                  </tr>
                                              </table>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                            ?>
                            </ul>
                        </article>
                        <article class="item">
                            <header>
                                <a><img src="images/shop3.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                                <?php
                                    if(getStoreStatus(2)==1){
                                        echo "<table>
                                                  <tr>
                                                      <td>
                                                      </td>
                                                      <td>
                                                          <img src='images/1.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/2.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/3.png' width='50' height='50'>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          產品售價
                                                      </td>
                                                      <td>
                                                          $PriceA
                                                      </td>
                                                      <td>
                                                          $PriceB
                                                      </td>
                                                      <td>
                                                          $PriceC
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          目前庫存
                                                      </td>
                                                      <td>
                                                          $NowA2
                                                      </td>
                                                      <td>
                                                          $NowB2
                                                      </td>
                                                      <td>
                                                          $NowC2
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          庫存上限
                                                      </td>
                                                      <td>
                                                          $MaxA2
                                                      </td>
                                                      <td>
                                                          $MaxB2
                                                      </td>
                                                      <td>
                                                          $MaxC2
                                                      </td>
                                                  </tr>
                                              </table>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                                ?>
                            </ul>
                        </article>
                        <article class="item">
                            <header>
                                <a><img src="images/shop4.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                                <?php
                                    if(getStoreStatus(3)==1){
                                        echo "<table>
                                                  <tr>
                                                      <td>
                                                      </td>
                                                      <td>
                                                          <img src='images/1.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/2.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/3.png' width='50' height='50'>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          產品售價
                                                      </td>
                                                      <td>
                                                          $PriceA
                                                      </td>
                                                      <td>
                                                          $PriceB
                                                      </td>
                                                      <td>
                                                          $PriceC
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          目前庫存
                                                      </td>
                                                      <td>
                                                          $NowA3
                                                      </td>
                                                      <td>
                                                          $NowB3
                                                      </td>
                                                      <td>
                                                          $NowC3
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          庫存上限
                                                      </td>
                                                      <td>
                                                          $MaxA3
                                                      </td>
                                                      <td>
                                                          $MaxB3
                                                      </td>
                                                      <td>
                                                          $MaxC3
                                                      </td>
                                                  </tr>
                                              </table>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                                ?>
                            </ul>
                        </article>
                        <article class="item">
                            <header>
                                <a><img src="images/shop5.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                                <?php
                                    if(getStoreStatus(4)==1){
                                        echo "<table>
                                                  <tr>
                                                      <td>
                                                      </td>
                                                      <td>
                                                          <img src='images/1.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/2.png' width='50' height='50'>
                                                      </td>
                                                      <td>
                                                          <img src='images/3.png' width='50' height='50'>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          產品售價
                                                      </td>
                                                      <td>
                                                          $PriceA
                                                      </td>
                                                      <td>
                                                          $PriceB
                                                      </td>
                                                      <td>
                                                          $PriceC
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          目前庫存
                                                      </td>
                                                      <td>
                                                          $NowA4
                                                      </td>
                                                      <td>
                                                          $NowB4
                                                      </td>
                                                      <td>
                                                          $NowC4
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td>
                                                          庫存上限
                                                      </td>
                                                      <td>
                                                          $MaxA4
                                                      </td>
                                                      <td>
                                                          $MaxB4
                                                      </td>
                                                      <td>
                                                          $MaxC4
                                                      </td>
                                                  </tr>
                                              </table>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                                ?>
                            </ul>
                        </article>
                    </section>

                <!-- CTA -->
                    <section id="cta" class="main special">
                        <ul class="actions">
                            <li><a href="index.php" class="button big">首頁</a></li>
                        </ul>
                    </section>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>
