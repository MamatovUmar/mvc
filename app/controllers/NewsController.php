<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Pagination;
use app\models\Tasks;
use app\models\Test;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $get = $this->get();
        $page = $get['page'] ?? 1;
        $task = new Tasks();

        $data = $task->findAll();
        $data = Pagination::init($data, $page, 10);
        $this->render('index', $data);
    }

    public function actionView($id)
    {
        $test = new Test();

        dump($test->rrr());
    }
}