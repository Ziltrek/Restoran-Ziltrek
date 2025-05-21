<div style="margin-left: 40px;" class="title">Меню</div>
<div class="wrapper">
    <a class="add-product-link" href="?type=addTovar" style="margin-left: 40px;">Добавить товар</a>
    <?php
        $queryAbout = $mysql->prepare("SELECT menu_catologe.title AS category_title, tovar.* FROM menu_catologe JOIN tovar ON menu_catologe.id = tovar.id_cataloge");
        if ($queryAbout === false) {
            // Обработка ошибки
            die("Ошибка при подготовке запроса: " . $mysql->error);
        }
        $queryAbout->execute();
        $result = $queryAbout->get_result();

        if ($result === false) {
            // Обработка ошибки
            die("Ошибка при получении результата: " . $mysql->error);
        }

        echo '
            <table class="product-table">
                <thead>
                    <tr>
                        <td>Изображение</td>
                        <td>Название</td>
                        <td>Описание</td>
                        <td>Стоимость</td>
                        <td>Категория</td>
                    </tr>
                </thead>
                <tbody>
        ';
        while($row = $result->fetch_assoc()) {
            printf(
                '
                <tr>
                    <td><img src="%s" alt="Изображение товара"></td>
                    <td><a href="?type=editTovar&id=%s">%s</a></td>
                    <td>%s</td>
                    <td>%s руб.</td>
                    <td>%s</td>
                </tr>
                ', 
                htmlspecialchars($row['img']), 
                htmlspecialchars($row['id']), 
                htmlspecialchars($row['title']), 
                htmlspecialchars($row['description']), 
                htmlspecialchars($row['price']), 
                htmlspecialchars($row['category_title'])
            );
        }
        echo '
                </tbody>
            </table>
        ';
    ?>
</div>
