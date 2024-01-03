<?php
//GANTI DATABASE DI SINI

$dbHost = "localhost";
$dbUser = "";
$dbPassword = "";
$dbName = "";

$dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Periksa koneksi
if ($dbConnection->connect_error) {
    die("Koneksi database gagal: " . $dbConnection->connect_error);
}
