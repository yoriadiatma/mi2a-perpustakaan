<?php
// ini adalah file untuk melakukan koneksi dari php ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "perpustakaan_db";

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    echo "Koneksi gagal!";
}
