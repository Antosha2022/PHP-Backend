<?php
$title = "Зворотній звʼязок";
require 'app/views/home/header.php';
?>

<div class="container main">
    <div class="link-info">
        <h1>Зворотній звʼязок</h1>
        <p>Звідси ви можете надіслати повідомлення</p>
        <form enctype="multipart/form-data" method="post" class="form-control" action="/contact/newFeedback">
            <?php
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $text = $_POST['text'] ?? '';
            $message = $data['message'] ?? '';
            ?>
            <input placeholder="Ваше імʼя" name="name" type="text" value="<?=$name?>"><br>
            <input placeholder="Контактний email" name="email" type="email" value="<?=$email?>" ><br>
            <h3>Текст повідомлення</h3>
            <textarea name="text" value="<?=$text?>" ></textarea><br>
<!--            <p>Додати файли</p>-->
           <input type="file" name="myfile[]" multiple id="myfile">
            <div class="error"><?=$message?></div>
            <input id="send-mail" value="Відправити" type="submit">
        </form>
    </div>
</div>

<?php require 'app/views/home/footer.php'; ?>
