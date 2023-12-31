<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="icon" href="/public/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

    <header>
        <img src="/public/img/logo_w.png" id="logo" alt="LarAng">
        <nav>
        <a href="/">Головна</a>

            <?php if (isset($_COOKIE['login'])) : ?>
                <a href="/contact">Зворотній звʼязок</a>
                <a href="/user/dashboard" class="btn">Кабінет користувача</a>
            <?php else :?>
                <a href="/user/auth" class="btn" >Авторизація</a>
                <a href="/user/registration" class="btn" >Реєстрація</a>
            <?php endif; ?>

        </nav>
    </header>