<?php

$this->title = 'Добавить задачу';

?>

<div class="container mt-5">
    <div class="card" style="width: 500px; margin: 0px auto">
        <div class="card-body">
            <h3 class="card-title mb-4"><?= encode($this->title) ?></h3>
            <form action="/task-add" method="POST" id="taskForm">

                <div class="form-group">
                    <label>Имя </label>
                    <input type="text" name="username" class="form-control">
                    <small id="usernameHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label>E-mail </label>
                    <input type="text" name="email" class="form-control">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label>Задача</label>
                    <textarea name="task" class="form-control" rows="6"></textarea>
                    <small id="taskHelp" class="form-text text-muted"></small>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>

            </form>
        </div>
    </div>
</div>