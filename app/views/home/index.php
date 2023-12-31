<?php

    if(isset($_COOKIE['login'])){
        require 'app/views/library/links.php';
    }
    else {
        require 'app/views/user/registration.php';
    }
