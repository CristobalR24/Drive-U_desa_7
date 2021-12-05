<?php
session_start();
if(!isset($_SESSION['sw'])){
    header("location: ../index.php");}
?>