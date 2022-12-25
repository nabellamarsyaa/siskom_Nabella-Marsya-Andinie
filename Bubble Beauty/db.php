<?php
    $hostname = 'sql303.byethost18.com';
    $username = 'b18_33172074';
    $password = 'bells0302';
    $dbname   = 'b18_33172074_db_bubble_beauty';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database');
?>