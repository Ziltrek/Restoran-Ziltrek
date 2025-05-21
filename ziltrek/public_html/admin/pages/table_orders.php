<div style="margin-left: 40px;" class="title">Заказы столов</div>

<div class="wrapper">

    <?php
        $queryOrders = $mysql->prepare("SELECT * FROM Bookatablee");
        if ($queryOrders === false) {
            // Обработка ошибки
            die("Ошибка при подготовке запроса: " . $mysql->error);
        }
        $queryOrders->execute();
        $result = $queryOrders->get_result();

        if ($result === false) {
            // Обработка ошибки
            die("Ошибка при получении результата: " . $mysql->error);
        }

        echo '
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Номер телефона</th>
                        <th>ФИО</th>
                        <th>Время и дата</th>
                        <th>Почта</th>
                        <th>Номер стола</th>
                        <th>Действия</th>
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
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td><a class="delete-link" href="?type=deleteOrder&id=%s">Удалить</a></td>
                </tr>
                ', 
                htmlspecialchars($row['telephone']), 
                htmlspecialchars($row['FIO']), 
                htmlspecialchars($row['time']), 
                htmlspecialchars($row['email']), 
                htmlspecialchars($row['table_number']),
                htmlspecialchars($row['id'])
            );
        }
        echo '
                </tbody>
            </table>
        ';
    ?>
</div>