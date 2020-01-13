<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Admin;
use app\models\Tasks;

class MainController extends Controller
{

    public function actionIndex()
    {

        $task = new Tasks();

        $data = $task->findAll();

        $this->render('index', [
            'data' => $data
        ]);
    }

    public function actionCreateTask()
    {
        $this->render('create');
    }

    public function actionTaskAdd()
    {
        header('Content-Type: application/json');

        $username = xss_clean($_POST['username']);
        $email = xss_clean($_POST['email']);
        $task = xss_clean($_POST['task']);
        $status = 'active';

        $errors = [];

        if (empty($username)) {
            $errors[] = [
                'usernameHelp' => 'Пожалуйста заполните поле Имя'
            ];
        }
        if (empty($task)) {
            $errors[] = [
                'taskHelp' => 'Пожалуйста заполните поле Задача'
            ];
        }
        if (empty($email)) {
            $errors[] = [
                'emailHelp' => 'Пожалуйста заполните поле E-mail'
            ];
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = [
                    'emailHelp' => 'E-mail не валиден'
                ];
            }
        }

        if (!empty($errors)) {
            $err['message'] = $errors;
            $err['status'] = 'error';
            exit(json_encode($err));
        } else {
            $tasks = new Tasks();
            $data = $tasks->insert('insert into tasks (username, email, task, status) values (:username, :email, :task, :status)', [
                'username' => $username,
                'email' => $email,
                'task' => $task,
                'status' => $status
            ]);
                // dump($data);
            $success['status'] = 'success';
            exit(json_encode($success));
        }
    }

    public function actionLogin()
    {
        $this->render('login');
    }

    public function actionLogout()
    {
        $_SESSION['login'] = '';
        $_SESSION['password'] = '';

        $this->redirect('/');
    }

    public function actionAuth()
    {
        header('Content-Type: application/json');

        $login = $_POST['login'];
        $password = $_POST['password'];

        $errors = [];

        if (empty($login)) {
            $errors[] = [
                'loginHelp' => 'Пожалуйста заполните поле Логин'
            ];
        }

        if (empty($password)) {
            $errors[] = [
                'passwordHelp' => 'Пожалуйста заполните поле Пароль'
            ];
        }

        if (!empty($errors)) {
            $err['message'] = $errors;
            $err['status'] = 'error';
            exit(json_encode($err));
        }

        if (Admin::isAdmin($login, $password)) {
            $success['status'] = 'success';
            exit(json_encode($success));
        } else {
            $err['message'][0] = ['loginHelp' => 'неправильный логин или пароль'];
            $err['status'] = 'error';
            exit(json_encode($err));
        }
    }
}
