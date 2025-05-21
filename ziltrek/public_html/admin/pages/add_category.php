<?php
require_once __DIR__ . '/../../db.php'; // Подключение к базе данных

// Проверка отправленной формы
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['title'])) {
    $title = $mysql->real_escape_string($_POST['title']);

    // Вставка новой категории в базу данных
    $stmt = $mysql->prepare("INSERT INTO menu_catologe (title) VALUES (?)");
    $stmt->bind_param('s', $title);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Категория успешно добавлена.";
    } else {
        echo "Ошибка при добавлении категории.";
    }
    $stmt->close();
}
?>
<!-- Форма для добавления категории -->
<form method="post">
    Название категории: <input type="text" name="title">
    <input type="submit" value="Добавить">
</form>
