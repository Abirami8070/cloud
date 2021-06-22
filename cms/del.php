<?php
$conn = new mysqli('localhost', 'root', '', 'cms_db');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `rfid` WHERE `rfid`.`id` = $id";
    $result  = $conn->query($sql);
    if ($result) {
        header('location:index.php');
    }
}

if (isset($_GET['no'])) {
    $id = $_GET['no'];
    $sql = "DELETE FROM `loadcell` WHERE `loadcell`.`id` = $id";
    $result  = $conn->query($sql);
    if ($result) {
        header('location:index.php');
    }
}
