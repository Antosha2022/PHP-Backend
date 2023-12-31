<div class="container main">
    <div class="link-info">
        <?php
        $pdo = null;
        $pdo = mysql::getInstence();

        $login = $_COOKIE['login'];
        $result = $pdo->query("SELECT `id` FROM `users` WHERE `login` = '$login'");
        $user_id =  $result->fetch(PDO::FETCH_ASSOC)['id'];

        $sql = "SELECT * FROM `library` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";
        $query = $pdo->prepare($sql);
        $query->execute();
        $links = $query->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;

        foreach ($links as $link) {
            echo '<div class="links-list">';
            echo '<strong><span> скорочене посилання: </span> 
                    <a href="'.$link['full_link'].' " target="blank">' . $link['user_link'] . '</a></strong></br>';
            echo '<small><div class="link-info"><span>повне посилання: 
                    </span>' .$link['full_link'] . '</small></br>';
            echo '</div>';
            ?>
            <form action="/link/delete/<?=$link['id']?>" method="post">
                <input type="hidden" name="delete_btn">
                <button type="submit" id="delete-button" class="btn">Видалити <i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>

            <?php
            echo '</div>';
        }
        ?>

    </div>
</div>
