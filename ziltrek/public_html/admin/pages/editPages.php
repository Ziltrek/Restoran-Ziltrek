<?php 
$query = $mysql-prepare("SELECT*from tovar where id=".$_GET['id']);
$query -> execute();
$query = $query -> get_result();
$result = $query->fetch_assoc();
?>
<div class="title">Редактирование</div>
<div class="wrapper">
    <form method="POST" action="lib/saveEditPages.php">
        <input type="text" name="title" value="<?php echo $result['title'] ?>">
        <input type="date" name="date" value="<?php echo $result['date'] ?>">

        <textarea name="description"><?php echo $result['description'] ?>"</textarea>
        <textarea name="text"><?php echo $result['text'] ?>"</textarea>
        <input type="submit" value="Сохранить">

    <input type="hidden" name="id" value="<?php echo $result['text'] ?>">


    </form>
</div>
