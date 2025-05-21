
<div class="title">Добавить</div>
<div class="wrapper">
    <?php 
    if(isset($_GET['isAdded'])) {
        echo "<div>
        Товар добавлен
        </div>";
    }
    
    
    ?>
    <form method="POST" action="lib/addetPages.php">
        <input type="text" name="title" value="">
        <input type="date" name="date" value="">

        <textarea name="description"></textarea>
        <textarea name="text"></textarea>
        <input type="submit" value="Сохранить">



    </form>
</div>
