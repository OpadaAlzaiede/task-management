<?php

namespace Http\forms;

abstract class Form {

    protected $errors;

    abstract public function validate($data);
    abstract public function errors();

    public function error($field, $message) {

        $this->errors[$field] = $message;
    }
}
