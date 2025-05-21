
<?php 
    $host = 'localhost';
    $name = 'ziltrek';
    $user = 'ziltrek';
    $password = 'Le*KEQKR2MXDXRQW';

    $mysql = new mysqli($host, $user, $password, $name);

    if($mysql->connect_error) {
        die('Connect Error: '. $mysql->connect_error);
    }
?>