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
        if ($exceed>0) { //只要不超過儲存空間
                if($stock<$howmany &&$stock!=0){
                        return 21;
                }
                else if($stock==0&&$howmany>0){
                        //沒庫存
                        return 0;
                }
                else if($howmany<=$exceed){
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
function sell($money,$pricea,$priceb,$pricec){
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
                $income=$randa*$pricea+$randb*$priceb+$randc*$pricec;
                $sum+=$income;
                $rs=mysqli_fetch_assoc($result);
        }
        $sql = "update company set money = $money+$sum;";
                mysqli_query($conn, $sql);
        return $sum;
}
//貨物到倉
// function order($money,$costa,$costb,$costc,$accounta,$accountb,$accountc){
//         $cost=$costa*$accounta+$costb*$accountb+$costc*$accountc;
//         echo $cost;
//         if($money>$cost){
//                 global $conn;
//                 //撈存貨
//                 $sql = "select * from company;";
//                 $result=mysqli_query($conn,$sql);
//                 $stockrs=mysqli_fetch_assoc($result);
//                 $stocka=$stockrs['goodsa'];
//                 $stockb=$stockrs['goodsb'];
//                 $stockc=$stockrs['goodsc'];
//                 //更新金錢
//                 $sql = "update company set money = $money-$cost;";
//                 mysqli_query($conn,$sql);
//                 //更新存貨
//                 $sql = "update company set goodsa = $stocka+$accounta;";
//                 mysqli_query($conn,$sql);
//                 $sql = "update company set goodsb = $stockb+$accountb;";
//                 mysqli_query($conn,$sql);
//                 $sql = "update company set goodsc = $stockc+$accountc;";
//                 mysqli_query($conn,$sql);
//                 return 1;
//         }
//         else
//                 return 0;
// }
//運貨時間減少(運貨中) 運到就入倉
function reducetime(){
        global $conn;
        $sql = "select * from orders;";
        $result=mysqli_query($conn,$sql);
        while($rs=mysqli_fetch_assoc($result)){
                $id=$rs['id'];
                $deadline=$rs['deadline'];
                $account=$rs['account'];
                $name=$rs['name'];
                if($deadline==0){
                        order($account,$name,$id);
                }
                $sql = "update orders set deadline = $deadline-1 where id='$id';";
                mysqli_query($conn,$sql);
        }
}
function order($account,$type,$id){
        echo "test";
        echo "account$account<br>";
        echo "type$type<br>";
        echo "type$id<br>";
        global $conn;
        $which = "goods".$type;
        $sql = "select * from company;";
        $result=mysqli_query($conn,$sql);
        $rs=mysqli_fetch_assoc($result);
        $stock=$rs[$which];
        echo $stock;
        $sql = "update company set $which = $stock+$account;";
        mysqli_query($conn,$sql);
        $sql = "delete from orders where id=$id;";
        mysqli_query($conn,$sql);
}
//叫貨
function callorder($money,$costa,$costb,$costc,$accounta,$accountb,$accountc){
        $cost=$costa*$accounta+$costb*$accountb+$costc*$accountc;
        echo $cost;
        if($money>$cost){
                global $conn;
                //撈貨物延遲與名稱
                $sql = "select * from goods;";
                $result=mysqli_query($conn,$sql);
                $rs=mysqli_fetch_assoc($result);
                $name=$rs['name'];
                $delay=$rs['delay'];
                //更新訂單
                $sql = "INSERT INTO orders(name,deadline,account)VALUES ('$name',$delay,$accounta);";
                mysqli_query($conn,$sql);
                $rs=mysqli_fetch_assoc($result);
                $name=$rs['name'];
                $delay=$rs['delay'];
                $sql = "INSERT INTO orders(name,deadline,account)VALUES ('$name',$delay,$accountb);";
                mysqli_query($conn,$sql);
                $rs=mysqli_fetch_assoc($result);
                $name=$rs['name'];
                $delay=$rs['delay'];
                $sql = "INSERT INTO orders(name,deadline,account)VALUES ('$name',$delay,$accountc);";
                mysqli_query($conn,$sql);
                return 1;
        }
        else
                return 0;
}
//設定價格 fixedprice為固定價格 range為浮動範圍
function setprice($name,$fixedprice,$range){
        global $conn;
        $price=$fixedprice+rand()%$range;
        $sql = "update goods set price = $price where name='$name';";
        mysqli_query($conn,$sql);
}
//設定成本 fixedprice為固定成本 range為浮動範圍
function setcost($name,$fixedcost,$range){
        global $conn;
        $cost=$fixedcost+rand()%$range;
        $sql = "update goods set cost = $cost where name='$name';";
        mysqli_query($conn,$sql);
}
function updateday($day){
        global $conn;
        $day=$day+1;
        $sql = "update company set day = $day;";
        mysqli_query($conn,$sql);
}
?>
