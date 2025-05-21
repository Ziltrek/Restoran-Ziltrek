<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../db.php'; // Подключение к базе данных

// Получение списка категорий для выпадающего списка
$stmt = $mysql->prepare("SELECT id, title FROM menu_catologe");
$stmt->execute();
$categories = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Обработка отправленной формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Собираем данные из формы
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $img = ''; // Путь к изображению будет установлен после загрузки файла

    // Загрузка файла изображения
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $img = '../lib/uploaded/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $img);
    }

    // Вставка данных в базу данных
    $stmt = $mysql->prepare("INSERT INTO tovar (title, description, price, id_cataloge, img) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('ssdis', $title, $description, $price, $category_id, $img);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Товар успешно добавлен.";
    } else {
        echo "Ошибка при добавлении товара.";
    }
}
?>

<!-- Форма для добавления товара -->
<div class="edit-form-title">Добавление нового товара</div>
<div class="edit-form-wrapper">
    <form method="POST" action="/admin/index.php?type=addTovar" enctype="multipart/form-data">
        
        <span>Название</span>
        <input type="text" name="title" class="edit-form-input" required>
        
        <span>Описание</span>
        <textarea name="description" class="edit-form-textarea" required></textarea>
        
        <span>Стоимость</span>
        <input type="number" name="price" class="edit-form-input" required>
        
        <span>Категория</span>
        <select name="category_id" class="edit-form-select" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>">
                    <?php echo htmlspecialchars($category['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    
        
        <input type="submit" class="edit-form-submit" value="Добавить товар">
    </form>

    


</div>
