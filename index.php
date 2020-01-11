<?php

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

require_once 'app/libs/functions.php';

require_once 'app/bootstrap.php';
