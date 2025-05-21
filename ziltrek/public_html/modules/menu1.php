<?php 
    require_once('db.php');
    $query = $mysql->prepare("SELECT * from menu");
    $query->execute();
    $query = $query->get_result();       
?>



<div class="header">
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
                    <a href="order.php">
                        <img class="cartimg" src="img/cart.png" alt="">
                    </a>
                </div>

                <div class="phone">
                    <div class="phoneholder">
                        <div class="phoneimg">
                            <img src="img/phone.png" alt="">
                        </div>
                        <div class="namber">
                            <a class="num" href="order.php">
                                +912-345-67-89
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


        </div>

    </div>