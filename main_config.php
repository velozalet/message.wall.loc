<?php
error_reporting(E_PARSE);
header("Content-type:text/html; charset=utf-8");
header("Cache-Control:no-store"); //no cash
ob_start();  //content buffering start

function __autoload($name_class) {  //load needs class when creating a class object
    require "models/$name_class.php";
}

$err_msg= '';  //to display a custom error

$O_ConnectDb = new ConnectDb();  //Object Class connection to the  database
$O_GuestBook = new GuestBook();  //Object of GuestBook Class