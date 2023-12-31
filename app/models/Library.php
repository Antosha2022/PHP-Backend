<?php

require "app/mysql.php";
class Library {
    public $user_id;
    public $id;
    public $full_link;
    public $user_link;
    private $_db = null;

    public function __construct() {
        $this->_db = mysql::getInstence();
    }

    public function getUserId() {
        $login = $_COOKIE['login'];
        $result = $this->_db->query("SELECT `id` FROM `users` WHERE `login` = '$login'");
        return $result->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public function addLink() {
        $user_id = $this->getUserId();
        $full_link = $_POST['full_link'];
        $user_link = $_POST['user_link'];

        $sql = 'INSERT INTO library(user_id, full_link, user_link) VALUES(:user_id, :full_link, :user_link)';
        $query = $this->_db->prepare($sql);
        $query->execute(['user_id' => $user_id, 'full_link' => $full_link, 'user_link' => $user_link]);
        header('Location: /library/links');
    }

    public function validLinkForm() {
        $user_link = $_POST['user_link'];
        $sql = "SELECT `user_link` FROM `library`";
        $query = $this->_db->query($sql);
        $linkValues = $query->fetchAll(PDO::FETCH_COLUMN);
        if (in_array($user_link, $linkValues))
            return "Таке посилання вже використовується";
        else
            return "Все добре";
    }

    public function deleteLink($id){
        $sql = "DELETE FROM `library` WHERE `id` = '$id'";
        $query = $this->_db->prepare($sql);
        $query->execute();
    }

    public function getAllLinks() {
        $user_id = $this->getUserId();
        $result = $this->_db->query("SELECT * FROM `library` WHERE `user_id` = '$user_id' ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}