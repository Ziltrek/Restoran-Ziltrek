<?php
session_start();



if(!empty($_POST['login']) && !empty($_POST['password'])) {
    
    
    require_once('../../db.php');
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = $mysql->prepare("SELECT * FROM admin WHERE login = ? and password = ?");
    $query->bind_param("ss", $login, $password);
    $query->execute();
    $result = $query->get_result();

        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['admin'] = 1;
            $_SESSION['name'] = $user['name'];

            header('LOCATION: http://ziltrek.temp.swtest.ru/admin/index.php');
        
        }  else {
            $_SESSION['error'] = "Неверный логин или пароль";
            header('LOCATION: http://ziltrek.temp.swtest.ru/admin/login.php'); 
        }

} else {
    $_SESSION['error'] = "Неверный логин или пароль";
    header('LOCATION: http://ziltrek.temp.swtest.ru/admin/login.php'); 
}
?>