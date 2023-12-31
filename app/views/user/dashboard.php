<?php
$title = "Кабінет користувача";
require 'app/views/home/header.php';
$login = $data['login'];

?>
<div class="container main">
    <div class="user-info">
        <h1>Кабінет користувача</h1>
        <p>Привіт, <b><?=$login?></b></p>

        <?php
        if (isset($_GET['url'])) {
            $messageSuccess =  explode('/',
                rtrim($_GET['url'], '/'));
            if($messageSuccess[2]){
                echo '<div class="mail-message">'.strval($messageSuccess[2]).'</div>';
            }
        }
        ?>
        <form action="/user/dashboard" method="post" class="exit-form">
            <input type="hidden" name="exit_btn">
            <button type="submit" class="btn">Вийти</button>
        </form>
    </div>
</div>
<?php require 'app/views/home/footer.php'; ?>
