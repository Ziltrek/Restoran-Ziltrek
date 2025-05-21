<?php 
if(isset($_GET['id'])) {
    $orderId = $_GET['id'];
    $queryDelete = $mysql->prepare("DELETE FROM Bookatablee WHERE id = ?");
    $queryDelete->bind_param('i', $orderId);
    if ($queryDelete->execute()) {
        echo "Удалено.";
    } else {
        echo "Ошибка при удалении: " . $mysql->error;
    }
}


?>