<?php

use \core\Authenticator;


$authenticator = new Authenticator();

$authenticator->logout();

redirect("/");
