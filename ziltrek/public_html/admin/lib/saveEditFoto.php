<?php
require_once("../../db.php");

if(isset($_FILES['file']['name'])) {
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];

    if($_FILES['file']['error'] == UPLOAD_ERR_OK && $size > 0) {
        $target_path = "uploads/" . $name;

        if(move_uploaded_file($tmp_name, $target_path)) {
            $im = file_get_contents($target_path);
            $imdata = 'data:image/jpeg;base64,' . base64_encode($im);

            $checkQuery = $mysql->prepare("SELECT id FROM tovar WHERE id = ?");
            $checkQuery->bind_param('i', $_POST['id']);
            $checkQuery->execute();
            $result = $checkQuery->get_result();

            if($result->num_rows == 0) {
                echo "Товар с таким ID не найден.";
            } else {
                $query = $mysql->prepare("UPDATE tovar SET img = ? WHERE id = ?");
                $query->bind_param('si', $imdata, $_POST['id']);
                $query->execute();

                if($query->affected_rows > 0) {
                    header("Location: /admin/index.php?type=editTovar&id=" . $_POST['id']);
                } else {
                    echo "Изображение товара уже обновлено или ошибка в запросе.";
                }
            }
        } else {
            echo "Ошибка при перемещении загруженного файла.";
        }
    } else {
        echo "Ошибка при загрузке файла: " . $_FILES['file']['error'];
    }
} else {
    echo "Файл для загрузки не выбран.";
}

?>
