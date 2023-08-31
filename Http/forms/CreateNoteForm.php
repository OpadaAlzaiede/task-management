<?php


namespace Http\forms;


use core\Validator;

class CreateNoteForm extends Form
{
    protected $errors;

    public function validate($data)
    {

        if(!Validator::string($data['title'], 1, 20)) {

            $this->errors['title'] = ['A title of no more than 20 characters is required.'];
        }

        if(!Validator::string($data['body'], 20, 1000)) {

            $this->errors['body'] = ['A body of no more than 1000 characters is required.'];
        }

        return empty($this->errors);
    }

    public function errors() {

        return $this->errors;
    }
}
