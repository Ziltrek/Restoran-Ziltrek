<?php
require_once __DIR__ . '/../../db.php'; // Подключение к базе данных

// Проверка наличия ID категории
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    // Удаление категории из базы данных
    $stmt = $mysql->prepare("DELETE FROM menu_catologe WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Категория успешно удалена.";
    } else {
        echo "Ошибка при удалении категории.";
    }
    $stmt->close();
}
?>
