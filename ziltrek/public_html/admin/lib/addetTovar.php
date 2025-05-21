<?php 
require_once('../../db.php');

// Проверяем, что форма была отправлена
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    // Подготавливаем запрос к базе данных
    $query = $mysql->prepare("INSERT INTO tovar (id_cataloge, title, description, img, id_product) VALUES (?, ?, ?, ?, ?)");
    
    // Привязываем параметры к запросу
    // Обратите внимание, что типы параметров должны соответствовать типам данных в вашей базе данных
    // 'i' для целочисленных, 's' для строковых, 'd' для чисел с плавающей точкой и 'b' для двоичных данных
    $query->bind_param("issss", $_POST['id_cataloge'], $_POST['title'], $_POST['description'], $_POST['img'], $_POST['id_product']);
    
    // Выполняем запрос
    $query->execute();

    // Проверяем, была ли добавлена запись
    if ($query->affected_rows > 0) {
        // Перенаправляем пользователя на страницу с сообщением об успешном добавлении
        header("Location: /admin/index.php?type=addTovar&isAdded=1");
    } else {
        // Перенаправляем пользователя на страницу с сообщением об ошибке
        header("Location: /admin/index.php?type=addTovar&isAdded=0");
    }
    
    // Закрываем запрос
    $query->close();
} else {
    // Если форма не была отправлена, выводим сообщение об ошибке
    echo "Форма не была отправлена.";
}
?>
