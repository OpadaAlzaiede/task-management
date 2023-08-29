<?php

namespace Http\Forms;

use core\Validator;

class LoginForm
{

    protected $errors;

    public function validate($email, $password)
    {

        if(!Validator::email($email)) {

            $this->errors['email'] = ['You should provide a valid email address.'];
        }

        if(!Validator::string($password, 7, 255)) {

            $this->errors['password'] = ['Please provide a valid password. !'];
        }

        return empty($this->errors);
    }

    public function errors() {

        return $this->errors;
    }
}
