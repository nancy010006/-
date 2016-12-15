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
                                echo "<script>alert('擴展成功')</script>";
                                header("Refresh: 0; url=index.php");
                                break;
                        case '12':
                                echo "<script>alert('擴展完畢')</script>";
                                header("Refresh: 0; url=index.php");
                                break;
                        case '21':
                                echo "<script>alert('金額不足')</script>";
                                header("Refresh: 0; url=index.php");
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
                        if($goodsastatus==11){
                                echo "<script>alert('Bread送貨成功')</script>";
                        }
                        if($goodsbstatus==11){
                                echo "<script>alert('Ice cream送貨成功')</script>";
                        }
                        if($goodscstatus==11){
                                echo "<script>alert('Soft drinks送貨成功')</script>";
                        }
                        if($goodsastatus==12){
                                echo "<script>alert('該分店Bread已達庫存上限，自動補滿')</script>";
                        }
                        if($goodsbstatus==12){
                                echo "<script>alert('該分店Ice cream已達庫存上限，自動補滿')</script>";
                        }
                        if($goodscstatus==12){
                                echo "<script>alert('該分店Soft drinks已達庫存上限，自動補滿')</script>";
                        }
                        if($goodsastatus==21){
                                echo "<script>alert('總店Bread貨品不足 請重新輸入')</script>";
                        }
                        if($goodsbstatus==21){
                                echo "<script>alert('總店Ice cream貨品不足 請重新輸入')</script>";
                        }
                        if($goodscstatus==21){
                                echo "<script>alert('總店Soft drinks貨品不足 請重新輸入')</script>";
                        }
                        if($goodsastatus==22){
                                echo "<script>alert('分店Bread儲存空間已滿 取消運送')</script>";
                        }
                        if($goodsbstatus==22){
                                echo "<script>alert('分店Ice cream儲存空間已滿 取消運送')</script>";
                        }
                        if($goodscstatus==22){
                                echo "<script>alert('分店Soft drinks儲存空間已滿 取消運送')</script>";
                        }
                        if($goodsastatus==0){
                                echo "<script>alert('總店已無Bread庫存')</script>";
                        }
                        if($goodsbstatus==0){
                                echo "<script>alert('總店已無Ice cream庫存')</script>";
                        }
                        if($goodscstatus==0){
                                echo "<script>alert('總店已無Soft drinks庫存')</script>";
                        }
                        header("Refresh: 0; url=index.php");
                        break;
        //每過一天就賣一次東西 並且減少運貨時間
        case "sell":
                $income=sell($money,getprice("a"),getprice("b"),getprice("c"));
                updateday(getday());
                reducetime();
                echo "獲得了".$income."元";
                header("Refresh: 0.3; url=index.php");
                break;
        case "setcost":
                setcost("a",100,50);
                setcost("b",150,50);
                setcost("c",200,50);
                echo "設定成功";
                header("Refresh: 0.3; url=index.php");
                break;
        case "setprice":
        setprice("a",150,50);
        setprice("b",250,60);
        setprice("c",350,100);
        echo "設定成功";
        header("Refresh: 0.3; url=index.php");
                break;

        case "callorder":
                $accounta=$_POST['accounta'];
                $accountb=$_POST['accountb'];
                $accountc=$_POST['accountc'];
                if(callorder($money,getcost("a"),getcost("b"),getcost("c"),$accounta,$accountb,$accountc)==1){
                        echo "<script>alert('預訂成功')</script>";

                }else{
                        echo "<script>alert('金額不足')</script>";
                }
         header("Refresh: 0; url=index.php");
        break;
}
?>
