<?php

$this->title = 'Редактировать задачу';

?>

<div class="container mt-5">
    <div class="card" style="width: 500px; margin: 0px auto">
        <div class="card-body">
            <h3 class="card-title mb-4"><?= encode($this->title) ?></h3>
            <form action="/admin/update" method="POST" id="taskForm">

                <div class="form-group">
                    <label>Задача</label>
                    <textarea name="task" class="form-control" rows="6"><?= $task['task'] ?></textarea>
                    <small id="taskHelp" class="form-text text-muted"></small>
                </div>

                <input type="hidden" name="id" value="<?= $task['id'] ?>">

                <div class="form-group">
                    <label>Статус </label>
                    <select name="status" class="form-control">
                        <option <?= $task['status']=='active' ? 'selected' : '' ?> value="active">Открытый</option>
                        <option <?= $task['status']=='closed' ? 'selected' : '' ?> value="closed">Выполнено</option>
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>

            </form>
        </div>
    </div>
</div>