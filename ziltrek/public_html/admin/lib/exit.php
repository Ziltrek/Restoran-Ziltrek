<?php

session_start();

session_destroy();
header('LOCATION: http://ziltrek.temp.swtest.ru/admin/login.php ');
?>