<?php
require("dbconnect.php");
function getMoney() {
        global $conn;
        $sql = "select * from company;";
        return mysqli_query($conn,$sql);
}
?>
