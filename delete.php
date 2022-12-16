<?php

include_once "connect.php";

$id = $_GET["deleteid"];
try {
    $sql = "delete from RichestPeople where id = $id";
    $pdo->exec($sql);
    echo "Deleted successfully";
    header('Location: read.php',true, 500);
    if ($result) {
        echo "Het record is verwijderd";
        header('Refresh:3; url=read.php');
    } else {
        echo "Het record is niet verwijderd";
        header('Refresh:3; url=read.php');
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}