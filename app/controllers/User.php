<?php
class User extends Controller {

    public function registration() {
        $data = [];
        if(isset($_POST['login'])) {
            $user = $this->model('UserModel');
            $user->setData($_POST['login'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);

            $isValid = $user->validForm();
            if($isValid == "Все добре")
                $user->addUser();
            else
                $data['message'] = $isValid;
        }
        $this->view('user/registration', $data);
    }

    public function dashboard() {
        $user = $this->model('UserModel');

        if(isset($_POST['exit_btn'])) {
            $user->logOut();
        }

        $this->view('user/dashboard', $user->getUser());
    }

    public function auth() {

        $data = [];
        if(isset($_POST['login'])) {
            $user = $this->model('UserModel');
            $data['message'] = $user->auth($_POST['login'], $_POST['pass']);
        }

        $this->view('user/auth', $data);
    }
}
