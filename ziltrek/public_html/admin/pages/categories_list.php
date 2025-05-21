<div style="margin-left: 40px;" class="title">Категории</div>
<div class="wrapper">
    <a class="add-product-link" href="?type=addCategory" style="margin-left: 40px;">Добавить категорию</a>
    <?php
        $queryCategories = $mysql->prepare("SELECT * FROM menu_catologe");
        if ($queryCategories === false) {
            // Обработка ошибки
            die("Ошибка при подготовке запроса: " . $mysql->error);
        }
        $queryCategories->execute();
        $result = $queryCategories->get_result();

        if ($result === false) {
            // Обработка ошибки
            die("Ошибка при получении результата: " . $mysql->error);
        }

        echo '
            <table class="product-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Название категории</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
        ';
        while($row = $result->fetch_assoc()) {
            printf(
                '
                <tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>
                        <a href="?type=editCategory&id=%s" class="editttt-link" >Изменить</a> |
                        <a href="?type=deleteCategory&id=%s" class="delete-link">Удалить</a>
                    </td>
                </tr>
                ', 
                htmlspecialchars($row['id']), 
                htmlspecialchars($row['title']), 
                htmlspecialchars($row['id']), 
                htmlspecialchars($row['id'])
            );
        }
        echo '
                </tbody>
            </table>
        ';
    ?>
</div>
