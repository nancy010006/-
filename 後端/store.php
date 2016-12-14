<?php
require("dbconnect.php");
//擴展分店
function buystore($money) {
        global $conn;
        $money=mysqli_real_escape_string($conn,$money);
        $sql = "select * from store;";
        $result=mysqli_query($conn,$sql);
        $rs=mysqli_fetch_assoc($result);
        while($rs['status']!=0){
                $rs=mysqli_fetch_assoc($result);
        }
        $price=$rs['price'];
        $storeid=$rs['storeid'];
        $exceed=$money-$price;
        if ($exceed>=0 && $rs['status']==0) { //if name is not empty
                $moneysql = "update store set status = 1 where storeid = '$storeid';";
                $storesql = "update company set money = '$exceed' where id = 1;";
                mysqli_query($conn, $moneysql);
                mysqli_query($conn, $storesql);
                return 11;
        } else if($exceed>=0 && $rs['status']==null){
                return 12;
        }else{
                return 21;
        }
}
//從總公司調貨至分店
/*
status=
11      欲運送的量可以成功完整送進倉庫
12      欲運送的量只能將部分送進倉庫
21      總公司存貨不夠運送欲運送的量
22      分店的空間已滿
*/
function post($goods,$store,$howmany) {
        global $conn;
        //算總公司的存貨
        $goods=mysqli_real_escape_string($conn,$goods);
        $store=mysqli_real_escape_string($conn,$store);
        $sql = "select * from company;";
        $result=mysqli_query($conn,$sql);
        $stockrs=mysqli_fetch_assoc($result);

        //分店
        //bound=界線 account=分店目前存量 stock=總店存貨
        $sql = "select * from store where storeid = '$store';";
        $result=mysqli_query($conn,$sql);
        $rs=mysqli_fetch_assoc($result);
        switch($goods) {
        case "a":
                $stock=$stockrs['goodsa'];
                $bound=$rs['bounda'];
                $account=$rs['goodsa'];
                break;
        case "b":
                $stock=$stockrs['goodsb'];
                $bound=$rs['boundb'];
                $account=$rs['goodsb'];
                break;
        case "c":
                $stock=$stockrs['goodsc'];
                $bound=$rs['boundc'];
                $account=$rs['goodsc'];
                break;
        default:
}
        //exceed看分店倉庫還有沒有空間
        $exceed = $bound-$account;
        //which為送至哪一間分店
        $which = "goods".$goods;
        if($stock<$howmany &&$stock!=0){
                $companysql = "update company set $which = 0;";
                mysqli_query($conn, $companysql);
                $storesql = "update store set $which = $account+$stock where storeid = $store;";
                mysqli_query($conn, $storesql);
                return 21;
        }
        if ($exceed>0) { //if name is not empty
                if($stock==0&&$howmany>0){
                        //沒庫存
                        return 0;
                }
                if($howmany<=$exceed){
                        //全運送
                        $companysql = "update company set $which = $stock-$howmany;";
                        mysqli_query($conn, $companysql);
                        $storesql = "update store set $which = $howmany+$account where storeid = $store;";
                        mysqli_query($conn, $storesql);
                        return 11;
                }
                else{
                        //只運送到滿
                        $companysql = "update company set $which = $stock-$exceed;";
                        mysqli_query($conn, $companysql);
                        $storesql = "update store set $which = $account+$exceed where storeid = $store;";
                        mysqli_query($conn, $storesql);
                        return 12;
                }
        } else if($howmany==0){
                return 23;
        }else{
                return 22;
        }
}
//隨機售出所有已開啟分店之商品
function sell($money){
        global $conn;
        $sql = "select * from store;";
        $result=mysqli_query($conn,$sql);
        $rs=mysqli_fetch_assoc($result);
        //已開啟的分店
        $sum=0;
        while($rs['status']!=0){
                //取得各分店代號及存貨
                $storeid=$rs['storeid'];
                $goodsa=getOtherGoodsA($storeid);
                $goodsb=getOtherGoodsB($storeid);
                $goodsc=getOtherGoodsC($storeid);
                //隨機設定賣出的數量 如果是0要處理 不然無法取餘數
                if($goodsa>0){
                        $randa=rand()%($goodsa+1);
                }else{
                        $randa=0;
                }
                if($goodsb>0){
                        $randb=rand()%($goodsb+1);
                }else{
                        $randb=0;
                }
                if($goodsc>0){
                        $randc=rand()%($goodsc+1);
                }else{
                        $randc=0;
                }
                //
                $sql = "update store set goodsa = $goodsa-$randa where storeid=$storeid;";
                        mysqli_query($conn, $sql);
                $sql = "update store set goodsb = $goodsb-$randb where storeid=$storeid;";
                        mysqli_query($conn, $sql);
                $sql = "update store set goodsc = $goodsc-$randc where storeid=$storeid;";
                        mysqli_query($conn, $sql);
                //計算獲取的金額
                        $income=$randa*(100+rand()%50)+$randb*(200+rand()%50)+$randc*(125+rand()%50);
                $sql = "update company set money = $money+$income;";
                        mysqli_query($conn, $sql);
                $sum+=$income;
                $rs=mysqli_fetch_assoc($result);
        }
        return $sum;
}
/*
function getMsgListbyability($ability) {
        global $conn;
        $sql = "select * from resume where ability like '%$ability%' order by salary desc;";
        return mysqli_query($conn,$sql);
}

function getyouremployee($boss){
        global $conn;
        $sql = "select * from user where boss = '$boss';";
        return mysqli_query($conn,$sql);
}

function getfeedback($userid){
        global $conn;
        $sql = "select * from satisfaction where name = '$userid';";
        return mysqli_query($conn,$sql);
}

function searchbybaility($ability){
        global $conn;
        $sql = "select * from resume like '$ability';";
        return mysqli_query($conn,$sql);
}

function addMsg($name, $ability, $salary,$userid,$birthday) {
        global $conn;
        $name=mysqli_real_escape_string($conn,$name);
        $ability=mysqli_real_escape_string($conn,$ability);
        $salary=mysqli_real_escape_string($conn,$salary);
        $userid=mysqli_real_escape_string($conn,$userid);
        $birthday=mysqli_real_escape_string($conn,$birthday);
        if ($name) { //if name is not empty
                $sql = "insert into resume (name, ability, salary,userid,birthday) values ('$name', '$ability','$salary','$userid','$birthday');";
                return mysqli_query($conn, $sql);
        } else {
                return false;
        }
}
*/
/*
function delMsg($resumeid) {
        global $conn;
        $sql = "delete from resume where id='$resumeid'";
        return mysqli_query($conn,$sql);
}

*/

?>
