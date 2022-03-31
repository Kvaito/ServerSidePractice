<div id="loginpage">
    <div class="backBlock">
        <h3>Регистрация</h3>
        <pre><?= $message ?? ''; ?></pre>
        <form method="post">
            <input type="hidden" name="formName" value="registration">
<!--            <input type="text" name="id institute" value='1'>-->
<!--            <input type="text" name="id role" value='1'>-->
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/><br>
            <label>Имя <br><input class="siteInputArea" type="text" name="name"></label><br>
            <label>Логин <br><input class="siteInputArea" type="text" name="login"></label><br>
            <label>Пароль <br><input class="siteInputArea" type="password" name="password"></label><br>
            <!--            <input type="checkbox" name="admin"><label>Администратор</label>-->
            <button class="sitebutton">Зарегистрировать</button>
        </form>
    </div>
</div>


