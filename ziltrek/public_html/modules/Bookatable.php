<?php 
if (isset($_POST['phone']) && isset($_POST['time']) && isset($_POST['FIO']) && isset($_POST['email']) && isset($_POST['table_number'])) {
    require_once('db.php');
    $query = $mysql->prepare("INSERT INTO Bookatablee (telephone, time, FIO, email, table_number) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("sssss", $_POST['phone'], $_POST['time'], $_POST['FIO'], $_POST['email'], $_POST['table_number']);
    
    if ($query->execute()) {
        echo "Успешно забронированно";
    } else {
        echo "Ошибка при бронировании. Свяжитесь с тех. роддержкой +7 ***-***-**-**: " . $query->error;
    }
}
?>
    





<div class="Bookatablee" style >

        <form action="#" method="post">
            <label for="FIO">ФИО:</label>
            <input type="text" name="FIO" required>


            
            <label for="table-number">Выберете номер стола</label>
            <select id="table-number" name="table_number">
        
                <option value="1">Стол 1</option>
                <option value="2">Стол 2</option>
                <option value="3">Стол 3</option>
                <option value="4">Стол 4</option>
                <option value="5">Стол 5</option>
                <option value="6">Стол 6</option>
                <option value="7">Стол 7</option>
                <option value="8">Стол 8</option>
                <option value="9">Стол 9</option>
                <!-- Добавьте остальные столы по аналогии -->
            </select>

                    <label for="time">Время:</label>
                    <input type="datetime-local" name="time" required> 
                    <label for="email">Электронная почта:</label>
                    <input type="email" name="email">
                    <label for="phone">Номер телефона:</label>
                    <input type="tel" required name="phone"  placeholder='+7' ><br /><br />
                    <input type="submit" value="Забронировать">

        </form>

</div>