<?php
class Home extends Controller {
        public function index($login = '') {
            $user = $this->model("UserModel");
            $user->login = $login;

            $this->view(
                'home/index',
                ['name'=> $user->login]
            );
        }
}
