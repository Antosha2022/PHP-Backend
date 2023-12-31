<?php
require "app/mysql.php";
class UserModel {
    public $login;
    public $email;
    private $pass;
    private $re_pass;
    private $id;
    private $_db = null;

    public function __construct() {
        $this->_db = mysql::getInstence();
    }

    public function setData($login, $email, $pass, $re_pass) {
        $this->login = $login;
        $this->email = $email;
        $this->pass = $pass;
        $this->re_pass = $re_pass;
    }

    public function validForm() {
        $sql = "SELECT `login` FROM `users`";
        $query = $this->_db->query($sql);
        $loginValues = $query->fetchAll(PDO::FETCH_COLUMN);
        if (in_array($this->login, $loginValues))
            return "Користувач із таким логіном вже зареєстрован";
        else if(strlen($this->login) < 3)
            return "Логін дуже короткий, треба мінімум 3 символа";
        else if(strlen($this->email) < 3)
            return "Email дуже короткий";
        else if(strlen($this->pass) < 3)
            return "Пароль дуже короткий, треба мінімум 3 символа";
        else if($this->pass != $this->re_pass)
            return "Пароли не співпадають";
        else
            return "Все добре";
    }

    public function addUser() {
        $sql = 'INSERT INTO users(login, email, password) VALUES(:login, :email, :password)';
        $query = $this->_db->prepare($sql);

        $password = password_hash($this->pass, PASSWORD_DEFAULT);
        $query->execute(['login' => $this->login, 'email' => $this->email, 'password' => $password]);

        $this->setAuth($this->login);
    }

    public function getUser() {
        $login = $_COOKIE['login'];
        $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function logOut() {
        setcookie('login', $this->login, time() - 3600, '/');
        unset($_COOKIE['login']);
        header('Location: /user/auth');
    }

    public function auth($login, $pass) {
        $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login'");
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            return 'Користувача з таким логіном не знайдено';
        }
        $hashedPassword = $user['password'];
        if(password_verify($pass, $hashedPassword))
            $this->setAuth($login);
        else
            return 'Введіть дійсний пароль';
    }

    public function setAuth($login) {
        setcookie('login', $login, time() + 3600, '/');
        header('Location: /user/dashboard');
    }

}