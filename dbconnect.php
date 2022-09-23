<?php

function addProduct()
{
    return;
}


$servername = "127.0.0.1";
$username = "root";
$password = "";

$dbname = "tranzistoriada";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Error: " . mysqli_connect_error());
}
