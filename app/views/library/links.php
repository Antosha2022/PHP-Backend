<?php
$title = "Скорочені посилання";
require 'app/views/home/header.php';
?>
<div class="container main">
    <div class="link-info">
        <h1>Скоротити посилання</h1>
        <p>Треба скоротити посилання? зараз зробимо!</p>
            <form action="/link/create" method="post" class="form-control">
                <?php
                $full_link = $_POST['full_link'] ?? '';
                $user_link = $_POST['user_link'] ?? '';
                $message = $data['message'] ?? '';
                ?>
                <input type="text" name="full_link" placeholder="Повне посилання" value="<?=$full_link?>"><br>
                <input type="text" name="user_link" placeholder="Скорочене посилання" value="<?=$user_link?>"><br>
                <div class="error"><?=$message?></div>
                <button class="btn">Додати до списку  <i class="fa fa-plus" aria-hidden="true"></i></button>
            </form>
        <h2>Скорочені посилання</h2>
    <?php require "list.php"; ?>
    </div>
</div>
<?php require 'app/views/home/footer.php'; ?>

