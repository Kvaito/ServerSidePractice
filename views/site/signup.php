<div id="loginpage">
    <div class="backBlock">
        <h3>Регистрация</h3>
        <pre><?= $message ?? ''; ?></pre>
        <form method="post" enctype="multipart/form-data">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/><br>
            <input type="hidden" name="formName" value="registration">
                Имя <br><input class="siteInputArea" type="text" name="name"></label><br>
            <label>
                Логин <br><input class="siteInputArea" type="text" name="login"></label><br>
            <label>
                Пароль <br><input class="siteInputArea" type="password" name="password"></label><br>
            <label>
                Роль<br>
                <select name="id_role" id="id_role">
                    <option value="1">Пользователь</option>
                    <option value="2">Администратор</option>
                </select>
            </label><br>
                <input type="file" name="avatar">
            <button class="sitebutton">Зарегистрировать</button>
        </form>
    </div>
</div>


