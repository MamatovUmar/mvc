<?php

$this->title = 'Админка';

?>


<div class="container mt-5">
    <div class="d-flex justify-content-between align-content-center">
        <h3>Список задач</h3>
        <a href="/create-task" class="btn btn-success">Добавить задачу</a>
    </div>
    <hr>

    <table class="table table-bordered table-hover" id="taskList">
        <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Задача</th>
                <th>Статус</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $task) : ?>
                <tr>
                    <td> <?= $key + 1 ?> </td>
                    <td> <?= $task['username'] ?> </td>
                    <td> <?= $task['email'] ?> </td>
                    <td> <?= $task['task'] ?> </td>
                    <td> <?= $task['status'] == 'active' ? 'Активный' : 'Выполнено' ?> </td>
                    <td> <?= $task['updated'] ? 'отредактировано администратором' : '' ?> </td>
                    <td>
                        <a href="/admin/update-task/<?= $task['id'] ?>" class="btn btn-primary btn-sm"> <i class="mdi mdi-pencil"></i> </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>