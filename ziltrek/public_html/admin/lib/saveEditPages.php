<?php 
require_once('../../db.php');

if (isset($_POST['id'], $_POST['id_cataloge'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['img'], $_POST['id_product'])) {
    $query = $mysql->prepare("UPDATE tovar SET id_cataloge = ?, title = ?, description = ?, price = ?, img = ?, id_product = ? WHERE id = ?");
    $query->bind_param('issssii', $_POST['id_cataloge'], $_POST['title'], $_POST['description'], $_POST['price'], $_POST['img'], $_POST['id_product'], $_POST['id']);
    
    if ($query->execute()) {
        header("Location: /admin/index.php?type=editPages&id=" . $_POST['id']);
        exit;
    } else {
        // Обработка ошибки
        echo "Ошибка при обновлении информации о товаре.";
    }
} else {
    // Обработка ошибки
    echo "Не все данные были предоставлены.";
}
?>