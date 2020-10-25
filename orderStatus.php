<?php
    session_start();
    $orderStat = $_GET['button_value'];
    $orderId = $_GET['order_id'];
    include "conn.php";
    //echo $orderId . " " . $orderStat;

    if ($orderStat == "shipped") {
        $statUpdate = "update orders set order_status = '$orderStat' where order_id = '$orderId'";
        //echo "shipped query executed";
    } else {
        $statUpdate = "update orders set order_status = '$orderStat' where order_id = '$orderId'";
        //echo "delivered query executed";
    }

    mysqli_query($conn,$statUpdate);
    //echo "Status Updated";
    header("location:adminPanel.php");
    

?>