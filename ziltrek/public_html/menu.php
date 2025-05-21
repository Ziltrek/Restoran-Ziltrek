
<?php   
    require_once('db.php');
    $queryCatologe = $mysql->prepare("SELECT * from menu_catologe");
    $queryCatologe->execute();
    $queryCatologe = $queryCatologe->get_result();   
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once('modules/head.php') ?>
<link rel="stylesheet" href="menu.css">
    <title>Меню</title>
</head>

<body>

<?php require_once('modules/menu1.php') ?>

<div class="menumenu">Меню:</div>

<div class="catalogue">
    <div><a href="menu.php">ВСЕ</a></div>
    <?php 
        while($resultCatologe = $queryCatologe->fetch_assoc()){
            echo "<div><a href='?cataloge=".$resultCatologe['id']."'>".$resultCatologe['title']."</a></div>";
        }
    ?>
</div>


  

<div class="products">
    <div class="productscart">
        <!-- Проверяем, был ли передан id категории -->
        <?php
        $id = isset($_GET['cataloge']) ? $_GET['cataloge'] : 'all';
        
        // Выбираем все товары, если не указана конкретная категория
        if ($id === 'all') {
            $queryTovar = $mysql->prepare("SELECT * FROM tovar");
        } else {
            // Иначе выбираем товары конкретной категории
            $queryTovar = $mysql->prepare("SELECT * FROM tovar WHERE id_cataloge = ?");
            $queryTovar->bind_param('i', $id); // Привязываем параметр id к запросу
        }
        
        $queryTovar->execute();
        $resultTovar = $queryTovar->get_result();
        
        while($row = $resultTovar->fetch_assoc()) {
            echo '
            <div class="ourmenucard">
                <div class="ourmenuprice">
                    <img src="'.$row['img'].'" class="ourmenuimg" alt="">
                    <div class="priceelipses">
                        <img src="img/Ellipse 2.png" class="priceelips" alt="">
                        <div class="price">'.$row['price'].'</div>
                    </div>
                </div>
                <div class="ourmenupricetitle">'.$row['title'].'</div>
                <div class="ourmenupricedesc">'.$row['description'].'</div>
            </div>
            ';
        }
        ?>
    </div>
</div>


<!-- Сделать коментарии! -->



    <div class="footer">
        <div class="footerve">
            <div class="footertext">
                <div class="footertitle">
                    Отпразднуйте в одном из <br>
                    самых лучших ресторанов.
                </div>
                <div class="footerdesc">
                    Только в этом месяце бизнес-ланч от 250 ₽
                </div>
            </div>

            <div class="footerbt">
                <div class="button">
                    <a href="order.php">
                        ЗАКАЗ СТОЛИКА
                    </a>
                </div>

            </div>
        </div>

    </div>

    <?php require_once('modules/footer.php'); ?>

</body>

</html>