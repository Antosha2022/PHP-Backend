<?php
$title = "Реєстрація";
require 'app/views/home/header.php';
?>
<div class="container main">
    <div class="link-info">
        <h1>Реєстрація</h1>
        <p>Тут ви можете зареєструватися</p>
        <form action="/user/registration" method="post" class="form-control">
            <?php
            $login = $_POST['login'] ?? '';
            $email = $_POST['email'] ?? '';
            $pass = $_POST['pass'] ?? '';
            $re_pass = $_POST['re_pass'] ?? '';
            $message = $data['message'] ?? '';
            ?>
            <input type="text" name="login" placeholder="login" value="<?=$login?>"><br>
            <input type="email" name="email" placeholder="email" value="<?=$email?>"><br>
            <input type="password" name="pass" placeholder="Введіть пароль" value="<?=$pass?>"><br>
            <input type="password" name="re_pass" placeholder="Введіть пароль ще раз" value="<?=$re_pass?>">
            <div class="error"><?=$message?></div>
            <button class="btn" id="send">Зареєструватися</button>
            <a href="/user/auth" class="btn" >якщо вже зареєстровані, можна авторизуватися</a>

        </form>
    </div>
</div>
<?php require 'app/views/home/footer.php'; ?>
