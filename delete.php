<?php

include_once "connect.php";

$id = $_GET["deleteid"];
try {
    $sql = "delete from RichestPeople where id = $id";
    $pdo->exec($sql);
    echo "record is succesvol verwijderd";
    header('Refresh:3; url=read.php');

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}