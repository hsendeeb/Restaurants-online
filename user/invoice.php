<?php
if(isset($_SESSION['client']) && isset($_GET['orderid'])){
    $orderid=$_GET['orderid'];
    $insert="insert into invoices";

}
?>