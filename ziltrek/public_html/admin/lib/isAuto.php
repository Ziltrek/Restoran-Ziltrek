<?php 

    session_start();
    
    if(!isset($_SESSION['admin']) ) 
    {
 header('LOCATION: http://ziltrek.temp.swtest.ru/admin/login.php ');
    } 
   
?>