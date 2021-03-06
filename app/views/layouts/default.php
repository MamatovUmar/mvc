<?php

use app\components\AssetsManager;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <?php AssetsManager::initCSS(); ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Задачник</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Список задач </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Админка</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?= $content ?>

    <?php AssetsManager::initJS(); ?>
</body>

</html>