<?php

$this->title = 'Авторизация';

?>
<div class="container mt-5">


    <div class="card" style="width: 500px; margin: 0px auto">
        <div class="card-body">
            <h3 class="card-title mb-4"><?= encode($this->title) ?></h3>
            <form action="/auth" method="POST" id="loginForm">

                <div class="form-group">
                    <label>Логин </label>
                    <input type="text" name="login" class="form-control" id="login">
                    <small id="loginHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <small id="passwordHelp" class="form-text text-muted"></small>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
                
            </form>
        </div>
    </div>



</div>