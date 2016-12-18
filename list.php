<?php
require("status.php");
$DeadlineA=getdeadline('a');
$DeadlineB=getdeadline('b');
$DeadlineC=getdeadline('c');
$AccountA=getaccount('a');
$AccountB=getaccount('b');
$AccountC=getaccount('c');
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
                        <h2><img src="images/list.png" width="50" height="50">現有訂單狀態表</h2>
                            <table>
                                <tr>
                                    <td>
                                        商品
                                    </td>
                                    <td>
                                        到貨時間
                                    </td>
                                    <td>
                                        數量
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="images/1.png" width="50" height="50">
                                    </td>
                                    <td>
                                        <?php echo $DeadlineA; ?>
                                    </td>
                                    <td>
                                        <?php echo $AccountA; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="images/2.png" width="50" height="50">
                                    </td>
                                    <td>
                                        <?php echo $DeadlineB; ?>
                                    </td>
                                    <td>
                                        <?php echo $AccountB; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="images/3.png" width="50" height="50">
                                    </td>
                                    <td>
                                        <?php echo $DeadlineC; ?>
                                    </td>
                                    <td>
                                        <?php echo $AccountC; ?>
                                    </td>
                                </tr>
                            </table>
                    </section>

                <!-- CTA -->
                    <section id="cta" class="main special">
                        <ul class="actions">
                            <li><a href="index.php" class="button big">回到首頁</a></li>
                        </ul>
                    </section>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>