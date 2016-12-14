<?php
session_start();
require("store.php");
require("status.php");
//require("question.php");

if(! isset($_REQUEST["act"])) {
        exit(0);
}
$act =$_REQUEST["act"];
$money=getMoney();
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
                }
                break;
        //從總公司調貨至分店
        //需要參數:1.分店代號 2.a.b.c貨品需要運送的數量
        case "transport":
                $goodsa=$_POST['goodsa'];
                $goodsb=$_POST['goodsb'];
                $goodsc=$_POST['goodsc'];
                $store=$_POST['store'];
                $goodsastatus=post("a",$store,$goodsa);
                $goodsbstatus=post("b",$store,$goodsb);
                $goodscstatus=post("c",$store,$goodsc);
                /*
                goods=
                11      欲運送的量可以成功完整送進倉庫
                12      欲運送的量只能將部分送進倉庫
                21      總公司存貨不夠運送欲運送的量 自動填滿
                22      分店的空間已滿
                0       沒庫存
                */
                if($goodsastatus==11&&$goodsbstatus==11&&$goodscstatus==11){
                        echo "運送成功";
                }
                if($goodsastatus==12){
                        echo "分店儲存a貨品空間不足 自動填滿<br>";
                }
                if($goodsbstatus==12){
                        echo "分店儲存b貨品空間不足 自動填滿<br>";
                }
                if($goodscstatus==12){
                        echo "分店儲存c貨品空間不足 自動填滿<br>";
                }
                if($goodsastatus==21){
                        echo "總店a貨品不足 已將總店剩餘貨物運送完畢<br>";
                }
                if($goodsbstatus==21){
                        echo "總店b貨品不足 已將總店剩餘貨物運送完畢<br>";
                }
                if($goodscstatus==21){
                        echo "總店c貨品不足 已將總店剩餘貨物運送完畢<br>";
                }
                if($goodsastatus==22){
                        echo "分店a儲存空間已滿 取消運送<br>";
                }
                if($goodsbstatus==22){
                        echo "分店b儲存空間已滿 取消運送<br>";
                }
                if($goodscstatus==22){
                        echo "分店c儲存空間已滿 取消運送<br>";
                }
                if($goodsastatus==0){
                        echo "總店已無a庫存<br>";
                }
                if($goodsbstatus==0){
                        echo "總店已無b庫存<br>";
                }
                if($goodscstatus==0){
                        echo "總店已無c庫存<br>";
                }
                break;
        case "sell":
                $income=sell($money);
                echo "獲得了".$income."元";
                header("Refresh: 0.3; url=index.php");
                break;
}
?>
