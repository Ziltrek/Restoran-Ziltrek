
<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('lib/isAuto.php');
    require_once('../db.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Панель админ</title>
</head>
<body>
<div class="sidebar">
    <h2>Админ Панель</h2>
    <a href="?type=tovar">Товар</a>
    <a href="?type=categories">Категории</a>
    <a href="?type=tableOrders">Заказы столов</a>
    
    <!-- Другие ссылки на разделы админ панели -->
    <a class="logout-button" href="lib/exit.php">Выход</a>
</div>

<div class="main-content">
    <?php 
    if(!empty($_GET)) {
        switch($_GET['type']) {
            case 'tovar':
                require_once('pages/tovar.php');
                break;
            case 'editTovar':
                require_once('pages/editTovar.php');
                break;
            case 'addTovar':
                require_once('pages/addTovar.php');
                break;
            case 'categories':
                require_once('pages/categories_list.php'); // Список категорий
                break;
            case 'addCategory':
                require_once('pages/add_category.php'); // Добавление категории
                break;
            case 'editCategory':
                require_once('pages/edit_category.php'); // Изменение категории
                break;
            case 'deleteCategory':
                require_once('pages/delete_category.php'); // Удаление категории
                break;
                case 'tableOrders':
                    require_once( 'pages/table_orders.php');
                    break;
                case 'deleteOrder':
                    require_once ('pages/delete_order.php');
                    break;
            
            // Добавьте другие случаи по мере необходимости
        }
    }
    ?>
    <!-- Содержимое админ панели -->
</div>

</body>
</html>