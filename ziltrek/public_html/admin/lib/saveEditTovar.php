<?php
require_once('../../db.php');

// Включение отображения ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Старт сессии для использования сессионных переменных
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Функция для проверки и обработки загруженного изображения
function handleImageUpload($file) {
    // Здесь должна быть логика проверки и сохранения изображения
    // Возвращаем новый путь к изображению или false, если загрузка не удалась
    return '/path/to/new/image.jpg';
}

// Проверка наличия обязательных данных
if (isset($_POST['id'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['category_id'])) {
    // Получение данных из формы
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Обработка загруженного изображения, если оно есть
    $newImagePath = isset($_FILES['image']) ? handleImageUpload($_FILES['image']) : null;

    // Подготовка запроса на обновление информации о товаре
    $query = "UPDATE tovar SET title = ?, description = ?, price = ?, id_cataloge = ?";
    // Если новый путь к изображению доступен, добавляем его в запрос
    if ($newImagePath) {
        $query .= ", img = ?";
    }
    $query .= " WHERE id = ?";

    $stmt = $mysql->prepare($query);
    if ($newImagePath) {
        // Если есть новое изображение, включаем его путь в параметры запроса
        $stmt->bind_param('ssdiss', $title, $description, $price, $category_id, $newImagePath, $id);
    } else {
        // Если изображение не обновляется, параметры запроса без пути к изображению
        $stmt->bind_param('ssdii', $title, $description, $price, $category_id, $id);
    }

    // Выполнение запроса
    if ($stmt->execute()) {
        // Установка сессионной переменной с сообщением об успехе
        $_SESSION['success'] = 'Товар успешно изменен';
        
        // Перенаправление обратно на страницу редактирования
        header("Location: /admin/index.php?type=editTovar&id=".$id);
        exit();
    } else {
        // Вывод ошибки
        die("Ошибка при обновлении информации о товаре: " . $stmt->error);
    }
} else {
    // Вывод сообщения об ошибке, если не все данные были предоставлены
    die("Не все обязательные данные были предоставлены.");
}
?>
