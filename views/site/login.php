<div id="loginpage">
    <div class="backBlock">
        <h2>Авторизация</h2>
        <h3><?= $message ?? ''; ?></h3>

        <h3><?= app()->auth->user()->name ?? ''; ?></h3>
        <?php
        if (!app()->auth::check()):
            ?>
            <form method="post">
                <input name="csrf_token"  type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label>Логин <br><input class="siteInputArea" type="text" name="login"></label><br>
                <label>Пароль <br><input class="siteInputArea" type="password" name="password"></label><br>
                <button class="sitebutton">Войти</button>
            </form>
        <?php endif; ?>
    </div>
</div>

