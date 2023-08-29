<?php


namespace core\middlewares;


class Guest
{

    public function handle() {

        $user = isset($_SESSION['user']) ? $_SESSION['user'] : false;

        if($user) {

            header('location: /');
            exit();
        }
    }
}
