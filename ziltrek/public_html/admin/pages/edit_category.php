<?php
require_once __DIR__ . '/../../db.php'; // Подключение к базе данных

// Проверка отправленной формы
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id']) && !empty($_POST['title'])) {
    $id = intval($_POST['id']);
    $title = $mysql->real_escape_string($_POST['title']);

    // Обновление категории в базе данных
    $stmt = $mysql->prepare("UPDATE menu_catologe SET title = ? WHERE id = ?");
    $stmt->bind_param('si', $title, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Категория успешно изменена.";
    } else {
        echo "Ошибка при изменении категории.";
    }
    $stmt->close();
}
?>
<!-- Форма для изменения категории -->
<form method="post">
    ID категории: <input type="text" name="id">
    Новое название: <input type="text" name="title">
    <input type="submit" value="Изменить">
</form>
