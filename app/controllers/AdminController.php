<?php

namespace app\controllers;

use app\models\Admin;
use app\models\Tasks;
use app\core\Controller;

class AdminController extends Controller
{

    public $layout = 'admin';

    public function actionIndex()
    {
        if(!Admin::isAuth()){
            $this->redirect('/login');
        }
        
        $task = new Tasks();

        $data = $task->findAll();

        $this->render('index', [
            'data' => $data
        ]);

    }

    public function actionUpdateTask()
    {
        if(!Admin::isAuth()){
            $this->redirect('/login');
        }

        $id = xss_clean($this->route['id']);
        $task = new Tasks();

        $this->render('update', [
            'task' => $task->findOne($id)
        ]);
    }

    public function actionUpdate()
    {
        if(!Admin::isAuth()){
            $this->redirect('/login');
        }

        header('Content-Type: application/json');

        $task = xss_clean($_POST['task']);
        $status = xss_clean($_POST['status']);
        $id = xss_clean($_POST['id']);

        $errors = [];
        if (empty($id)) {
            $errors[] = [
                'idHelp' => 'Задача не выбрвн'
            ];
        }

        if (empty($status)) {
            $errors[] = [
                'usernameHelp' => 'Пожалуйста заполните поле Статус'
            ];
        }
        if (empty($task)) {
            $errors[] = [
                'taskHelp' => 'Пожалуйста заполните поле Задача'
            ];
        }
        

        if (!empty($errors)) {
            $err['message'] = $errors;
            $err['status'] = 'error';
            exit(json_encode($err));
        } else {
            $tasks = new Tasks();
            $tasks->update('UPDATE tasks SET task=:task, status=:status, updated=1 WHERE id=:id', [
                'task' => $task,
                'status' => $status,
                'id' => $id,
            ]);
            $success['status'] = 'success';
            exit(json_encode($success));
        }
    }
}