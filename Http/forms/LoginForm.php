<?php

namespace Http\forms;

use core\Validator;

class LoginForm extends Form
{

    protected $errors;

    public function validate($data)
    {

        if(!Validator::email($data['email'])) {

            $this->errors['email'] = ['You should provide a valid email address.'];
        }

        if(!Validator::string($data['password'], 1, 255)) {

            $this->errors['password'] = ['Please provide a valid password. !'];
        }

        return empty($this->errors);
    }

    public function errors() {

        return $this->errors;
    }
}
