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
//取得目前天數
function getday() {
        global $conn;
        $sql = "select day from company;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['day'];
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
function getStoreStatus($storeid) {
        global $conn;
        $sql = "select status from store where storeid=$storeid;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['status'];
}
//A上限庫存
function getotherstockA($storeid) {
        global $conn;
        $sql = "select bounda from store where storeid=$storeid;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['bounda'];
}
//B上限庫存
function getotherstockB($storeid) {
        global $conn;
        $sql = "select boundb from store where storeid=$storeid;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['boundb'];
}
//C上限庫存
function getotherstockC($storeid) {
        global $conn;
        $sql = "select boundc from store where storeid=$storeid;";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['boundc'];
}
//訂單到貨日期
function getdeadline($name) {
        global $conn;
        $sql = "select deadline from orders where name='$name';";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['deadline'];
}
//訂單到貨數量
function getaccount($name) {
        global $conn;
        $sql = "select account from orders where name='$name';";
        $result = mysqli_query($conn,$sql);
        $rs = mysqli_fetch_assoc($result);
        return $rs['account'];
}
?>
