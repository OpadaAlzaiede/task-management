<?php

namespace Http\forms;

interface Form {

    public function validate($data);
    public function errors();

}
