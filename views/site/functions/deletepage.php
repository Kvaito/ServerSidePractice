<div class="twoBlockPage">
    <div class="backBlock">
        <h3>
            Удалить подразделение
        </h3>
        <form method="post">
            <input type="hidden" name="formName" value="divisionDelete">
            Название <br> <input class="siteInputArea" type="text" name="title"><br>
            <button class="sitebutton">
                Удалить
            </button>
        </form>
        <div><?= $messageDivision ?></div>
    </div>

    <div class="backBlock">
        <h3>
            Удалить помещение
        </h3>
        <form method="post">
            <input type="hidden" name="formName" value="roomDelete">
            Номер подразделения<br> <input class="siteInputArea" type="text" name="id_division"><br>
            Номер <br> <input class="siteInputArea" type="text" name="roomNumber"><br>
            <button class="sitebutton">
                Удалить
            </button>
        </form>
        <div><?= $messageRoom ?></div>
    </div>
</div>