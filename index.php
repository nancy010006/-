<?php
require("status.php");
$money=getMoney();
$goodsa=getGoodsA();
$goodsb=getGoodsB();
$goodsc=getGoodsC();
?>
<!DOCTYPE HTML>
<!--
    Epilogue by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>Bread Shop</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body>

        <!-- Header -->
            <header id="header" class="alt">
                <div class="inner">
                    <h1>Bread Shop</h1>
                    <p>The Taste of Happiness</p>
                </div>
            </header>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Banner -->
                    <section id="intro" class="main">
                        <div id=gold>
                            <h2><img src="images/gold.jpg" width="50" height="50">現有金幣：<?php echo $money ?></h2>
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
                                <input type='hidden' name='act' value='order'>
                                <table id=buystock border="0">
                                    <tr>
                                        <td>
                                            Bread
                                        </td>
                                        <td>
                                            Ice cream
                                        </td>
                                        <td>
                                            Soft drinks
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
                                <a href="#"><img src="images/shop1.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                            <?php
                                    if(getStoreStatus(1)==1){
                                        echo "<li><a href='#' class='button'>分店一</a></li>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                            ?>
                            </ul>
                        </article>
                        <article class="item">
                            <header>
                                <a href="#"><img src="images/shop2.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                                <?php
                                    if(getStoreStatus(2)==1){
                                        echo "<li><a href='#' class='button'>分店二</a></li>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                                ?>
                            </ul>
                        </article>
                        <article class="item">
                            <header>
                                <a href="#"><img src="images/shop3.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                                <?php
                                    if(getStoreStatus(3)==1){
                                        echo "<li><a href='#' class='button'>分店三</a></li>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                                ?>
                            </ul>
                        </article>
                        <article class="item">
                            <header>
                                <a href="#"><img src="images/shop4.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                                <?php
                                    if(getStoreStatus(4)==1){
                                        echo "<li><a href='#' class='button'>分店四</a></li>";
                                    }
                                    else{
                                        echo "<li><a href='controller.php?act=buy' class='button'>擴張店面</a></li>";
                                    }
                                ?>
                            </ul>
                        </article>
                        <article class="item">
                            <header>
                                <a href="#"><img src="images/shop5.jpg" alt="" /></a>
                            </header>
                            <ul class="actions">
                                <?php
                                    if(getStoreStatus(5)==1){
                                        echo "<li><a href='#' class='button'>分店五</a></li>";
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
                            <li><a href="controller.php?act=buy" class="button big">擴張店面</a></li>
                        </ul>
                    </section>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>