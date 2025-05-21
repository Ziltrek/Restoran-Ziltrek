
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('modules/head.php') ?>
    <title>Ресторан</title>
</head>
<body>
    
<?php 
    require_once('db.php');
    $query = $mysql->prepare("SELECT * from menu");
    $query->execute();
    $query = $query->get_result();

    
        
?>



<div class="headerhome">
    <div class="container">
        <div class="line">
            <div class="logo">
                <img src="img/LOGO.png" alt="#">
            </div>
            <nav>
                <?php 
                    while ($result = $query ->fetch_assoc()) {
                    echo "<li><a class='navitem' href='".$result['url']."'>".$result['name']."</a></li>";
                    }


                ?>
            </nav>

            <div class="cart">
                <a href="#">
                    <img class="cartimg" src="img/cart.png" alt="">
                </a>
            </div>

            <div class="phone">
                <div class="phoneholder">
                    <div class="phoneimg">
                        <img src="img/phone.png" alt="">
                    </div>
                    <div class="namber">
                        <a class="num" href="#">
                            +012-345-67-89
                        </a>
                    </div>
                </div>
                <div class="phonetext">
                    Свяжитесь с нами для <br> бронирования
                </div>
            </div> 
            <div class="button">
                <a href="order.php">
                    ЗАКАЗ СТОЛИКА
                </a>
            </div>

        </div>


        <div class="headerdown">
            <div class="headertitle">
                Добро пожаловать в
                <div class="headersubtitle">
                    Наш ресторан
                </div>


                <div class="headersuptitle">ДОМ ЛУЧШЕЙ ЕДЫ</div>
            


                <div class="headerbth">
                    <a href="menu.php" class="headerbutton">
                        VIEW MENU
                    </a>
                </div>
            </div>
        </div>


    </div>
    
</div>
<div class="cards">
    <div class="container">
        <div class="cardsholder">
            <div class="card" >
                <div class="cardimge">
                    <img class="cardimg" src="img/card.png" alt="">
                </div>
                <div class="cardtitle">
                    Магическая<span>&nbsp;Атмосфера</span>
                </div>
                <div class="carddesc">
                    В нашем заведении царит <br> магическая атмосфера <br>
                    наполненная вкусными <br> ароматами
                </div>

            </div>
            <div class="card" >
                <div class="cardimge">
                    <img class="cardimg" src="img/card.png" alt="">
                </div>
                <div class="cardtitle">
                    Лучшее качество<span>&nbsp;Еды</span>
                </div>
                <div class="carddesc">
                    Качество нашей <br> Еды - отменное!
                </div>

            </div>
            <div class="card" >
                <div class="cardimge">
                    <img class="cardimg" src="img/card.png" alt="">
                </div>
                <div class="cardtitle">
                    Недорогая <span>&nbsp;Еда</span>
                </div>
                <div class="carddesc">
                    Стоимость нашей Еды <br> зависит только от ее <br>
                    количества. Качество <br> всегда на высоте!
                </div>

            </div>
        </div>
    </div>
</div>
<div class="historyad">
    <div class="history">
        
        <div class="containerhistory">
            <div class="historytitle">
                Наша<span>&nbsp;История</span> 
            </div>
            <div class="historydesc">
                Как и у любого другого самобытного места, у нас есть <br> своя, особая история. Идея ресторана пришла <br> основателям неожиданно. Во время прогулки по лесу <br> создатель нашего ресторана застрял в сотнях <br> километров от ближайшего населенного пункта. Вдали <br> от цивилизации и связи им пришлось навремя <br> обустровать себе нехитрый быт, добывать и готовить <br>себе еду.
            </div>


            <div class="historynamber">
                <div class="namberitem">
                    <span>93</span> Напитки
                </div>
                <div class="namberitem">
                    <span>206</span> Еда
                </div>
                <div class="namberitem">
                    <span>71</span> Закуски
                </div>
            </div>

        </div>


            <div class="historyimg">
                <div>
                <img src="img/history.png" alt="">
                </div>
            </div>
        
    </div>
</div>
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
