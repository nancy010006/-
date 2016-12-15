<?php
require("dbconnect.php");
//取得目前金錢
function getMoney() {
        global $conn;
        $sql = "select money from company;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['money'];
}

//取得總店A存貨數量
function getGoodsA() {
        global $conn;
        $sql = "select goodsa from company;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['goodsa'];
}
//取得總店B存貨數量
function getGoodsB() {
        global $conn;
        $sql = "select goodsb from company;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['goodsb'];
}
//取得總店C存貨數量
function getGoodsC() {
        global $conn;
        $sql = "select goodsc from company;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['goodsc'];
}
//取得分店A存貨
function getOtherGoodsA($storeid) {
        global $conn;
        $sql = "select goodsa from store where storeid=$storeid;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['goodsa'];
}
//取得分店B存貨
function getOtherGoodsB($storeid) {
        global $conn;
        $sql = "select goodsb from store where storeid=$storeid;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['goodsb'];
}
//取得分店C存貨
function getOtherGoodsC($storeid) {
        global $conn;
        $sql = "select goodsc from store where storeid=$storeid;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['goodsc'];
}
//取得商品運送延遲
function getperiod($name){
        global $conn;
        $sql = "select delay from goods where name='$name';";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['delay'];
}
//取得商品售價
function getprice($name){
        global $conn;
        $sql = "select price from goods where name='$name';";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['price'];
}
//取得商品成本
function getcost($name){
        global $conn;
        $sql = "select cost from goods where name='$name';";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['cost'];
}
?>
