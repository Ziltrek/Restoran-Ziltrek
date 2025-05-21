<?php 
session_start();

if(isset($_SESSION['admin']) ) {
    header('LOCATION: http://ziltrek.temp.swtest.ru/index.php ');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    form div {
        margin-bottom: 15px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box; /* Добавляет padding в общую ширину элемента */
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #5cb85c;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #4cae4c;
    }

    /* Стили для лейблов */
    span {
        display: block;
        margin-bottom: 5px;
    }


</style>
</head>
<body>
<form action="lib/islogin.php" method="post">
        <div class="login">

            <span>
                Логин:
            </span>
            <input type="text" name="login" required>

        </div>

        <div class="password">
        <span>
                Пароль:
            </span>
            <input type="password" name="password" required>
        </div>
        <span><?php if(isset($_GET['error'])) echo $_GET['error']; ?></span> <br />
    <input type="submit" value="Войти">
</form>

</body>
</html>