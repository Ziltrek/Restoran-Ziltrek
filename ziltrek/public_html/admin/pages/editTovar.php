<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../db.php'; // Подключение к базе данных

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stmt = $mysql->prepare("SELECT menu_catologe.title AS category_title, tovar.* FROM menu_catologe JOIN tovar ON menu_catologe.id = tovar.id_cataloge WHERE tovar.id = ?");
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        // HTML-код для отображения формы будет здесь
    } else {
        echo "Запись не найдена.";
    }
} else {
    echo "Неверный ID.";
}

$stmt = $mysql->prepare("SELECT id, title FROM menu_catologe");
$stmt->execute();
$categories = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

?>

<div class="edit-form-title">Редактирование товара</div>
<div class="edit-form-wrapper">
    <form method="POST" action="lib/saveEditTovar.php" enctype="multipart/form-data">
        
        <span>Название</span>
        <input type="text" name="title" class="edit-form-input" value="<?php echo htmlspecialchars($result['title']); ?>">
        <span>Описание</span>
        <textarea name="description" class="edit-form-textarea"><?php echo htmlspecialchars($result['description']); ?></textarea>
        <span>Стоимость</span>
        <input type="number" name="price" class="edit-form-input" value="<?php echo htmlspecialchars($result['price']); ?>">
        
        <span>Категория</span>
        <select name="category_id" class="edit-form-select">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>" <?php echo $result['id_cataloge'] == $category['id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($category['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id']); ?>">
        <input type="submit" class="edit-form-submit" value="Сохранить">
    </form>
    <form method="POST" action="lib/saveEditFoto.php" enctype="multipart/form-data" class="form-edit-aga">
        <span>Изображение</span>
        <!-- Если у товара уже есть изображение, отобразим его -->
        <?php if (!empty($result['img'])): ?>
            <img src="<?php echo $result['img']; ?>" alt="Текущее изображение" style="max-width: 200px;">
        <?php endif; ?>

        <input type="file" name="file" class="edit-form-input"> <!-- Исправлено имя поля с 'fale' на 'file' -->
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
        <input type="submit" class="edit-form-submit" value="Обновить фото">
    </form>
</div>