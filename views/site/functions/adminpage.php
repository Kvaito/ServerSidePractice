<div class="twoBlockPage">
    <div class="backBlock">
<h3>
    Добавить подразделение
</h3>
        <form method="post">
            <input type="hidden" name="formName" value="divisionAdd">
            Название <br> <input class="siteInputArea" type="text" name="title"><br>
            Описание <br> <input class="siteInputArea" type="text" name="description">
            <button class="sitebutton">
                Добавить
            </button>
        </form>
        <div><?= $messageDivision ?></div>
    </div>

    <div class="backBlock">
        <h3>
            Добавить помещение
        </h3>
        <form method="post">
            <input type="hidden" name="formName" value="roomAdd">
            Номер подразделения<br> <input class="siteInputArea" type="text" name="id_division"><br>
            Номер <br> <input class="siteInputArea" type="text" name="roomNumber"><br>
            Этаж <br> <input class="siteInputArea" type="text" name="floor"><br>
            Вид помещения <br> <input class="siteInputArea" type="text" name="type"><br>
            Площадь <br> <input class="siteInputArea" type="text" name="area"><br>
            Кол-во мест <br> <input class="siteInputArea" type="text" name="places"><br>
            <button class="sitebutton">
                Добавить
            </button>
        </form>
        <div><?= $messageRoom ?></div>
    </div>

    <div class="backBlock">
        <h3>
            Доп. функции
        </h3>
        <div class="sitebutton" style="margin-left:15%">
            <a href="<?= app()->route->getUrl('/studyrooms/signup') ?>">Регистрация</a>
        </div>
        <div class="sitebutton" style="margin-left:15%">
            <a href="<?= app()->route->getUrl('/studyrooms/deletepage') ?>">Панель удаления</a>
        </div>
    </div>

</div>