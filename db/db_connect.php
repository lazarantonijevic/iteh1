<?php

$host = 'localhost';
$user = 'korisnik';
$password = 'sifra';
$database = 'premierleague';
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
