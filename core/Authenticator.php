<?php


namespace core;

use core\App;

class Authenticator
{

    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(\core\Database::class);
    }

    public function register($data) {

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $data['email']
        ])->find();

        if($user) return false;

        $this->db->query("INSERT INTO users(email, password) VALUES (:email, :password)", [
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
        ]);

        login(['email' => $data['email']]);

        return true;
    }

    public function attempt($email, $password) {

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ])->find();

        if(!$user) return false;

        if(!password_verify($password, $user['password'])) return false;

        $this->login($user);

        return true;
    }

    public function login($user) {

        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout() {

        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', "", time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
