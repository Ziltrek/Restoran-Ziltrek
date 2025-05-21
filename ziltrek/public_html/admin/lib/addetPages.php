<?php 
require_once('../../db.php'); 





    $query = $mysql->prepare("INSERT INTO tovar (id_cataloge, title, description, img, id_product) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("sssss", $_POST['id_cataloge'], $_POST['title'], $_POST['description'], $_POST['img'], $_POST['id_product']);
    $query->execute();
    $query = $query->get_result();

    header("LOCATION:/admin/imdex.php?type=addPAges&isAdded=1");
    



?>