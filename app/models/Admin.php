<?php

namespace app\models;

class Admin
{
    const LOGIN = 'admin';
    const PASSWORD = '$2y$10$l0FhUXGOf7nU5bEBmWkCzea7rm5om6lO5.uFNROz0/xAU6padO/Ce';

    public static function isAuth()
    {
        if ($_SESSION['login'] == self::LOGIN && $_SESSION['password'] == self::PASSWORD) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin($login, $password)
    {
        if ($login == self::LOGIN && password_verify($password, self::PASSWORD)) {
            $_SESSION['login'] = 'admin';
            $_SESSION['password'] = self::PASSWORD;
            return true;
        } else {
            return false;
        }
    }
}
