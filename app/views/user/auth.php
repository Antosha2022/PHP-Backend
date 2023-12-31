<?php
$title = "Авторизація";
require 'app/views/home/header.php';
?>
<div class="container main">
    <div class="link-info">
        <h1>Авторизація</h1>
        <p>Тут ви можете авторизуватися</p>
        <form action="/user/auth" method="post" class="form-control">
            <?php
            $login = $_POST['login'] ?? '';
            $pass = $_POST['pass'] ?? '';
            $message = $data['message'] ?? '';
            ?>
            <input type="text" name="login" placeholder="Введіть логін" value="<?=$login?>"><br>
            <input type="password" name="pass" placeholder="Введіть пароль" value="<?=$pass?>"><br>
            <div class="error"><?=$message?></div>
            <button class="btn" id="send">Увійти</button>
        </form>
    </div>
</div>
<?php require 'app/views/home/footer.php'; ?>
