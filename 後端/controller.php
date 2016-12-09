<?php
session_start();
require("store.php");
require("status.php");
//require("question.php");

if(! isset($_REQUEST["act"])) {
        exit(0);
}
$act =$_REQUEST["act"];
$result=getMoney();
$rs=mysqli_fetch_assoc($result);
$money=$rs['money'];
switch($act) {
        //擴展分店
        case "buy":
                $status=buystore($money);
                switch ($status) {
                        case '11':
                                echo "購買成功";
                                header("Refresh: 0.3; url=index.php");
                                break;
                        case '12':
                                echo "擴展完畢";
                                header("Refresh: 0.3; url=index.php");
                                break;
                        case '21':
                                echo "金錢不足";
                                header("Refresh: 0.3; url=index.php");
                                break;
                        default:
                                echo "出現異常錯誤";
                                break;
                }
                break;
                header("Refresh: 0.3; url=index.php");
                break;
        //從總公司調貨至分店
        case "transport":
                $goods=$_GET['goods'];
                $store=$_GET['store'];
                $howmany=30;
                $status=post($goods,$store,$howmany);
                /*
                status=
                11      欲運送的量可以成功完整送進倉庫
                12      欲運送的量只能將部分送進倉庫
                21      總公司存貨不夠運送欲運送的量
                22      分店的空間已滿
                */
                switch ($status) {
                        case '11':
                                echo "運送成功";
                                header("Refresh: 0.3; url=index.php");
                                break;
                        case '12':
                                echo "儲存空間不夠多，已幫您自動計算數量並填滿倉庫";
                                header("Refresh: 0.3; url=index.php");
                                break;
                        case '21':
                                echo "總公司存貨不足";
                                header("Refresh: 0.3; url=index.php");
                                break;
                        case '22':
                                echo "儲存空間已滿了無法運送";
                                header("Refresh: 0.3; url=index.php");
                                break;
                        default:
                                echo "出現異常錯誤";
                                break;
                }
                break;
        default:
}
?>
