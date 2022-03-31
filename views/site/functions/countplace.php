<div class="twoBlockPage">
    <div class="backBlock">
<span>
    Выбрать подразделения
</span>
        <form method="get">
            <input type="hidden" name="formName" value="checkBoxes">
            Написать вручную <br> <input class="siteInputArea" type="text" name="roomnumber">
            <div>Выбрать из списка</div>
            <div>
                <ul>
                    <?php
                    foreach ($divisions as $division)
                    {
                        ?>
                        <li>
                            <div class="listElem"><?= $division->title ?> <input type="checkbox" name="checkBoxForm[]" value="<?= $division->id ?>"></div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <button class="sitebutton">
                Вывести результаты
            </button>
        </form>
        <input type="hidden" name="formName" value="allChecked">
        <form method="get">
            <button class="sitebutton">
                Выбрать всё заведение
            </button>
        </form>

    </div>
    <div class="countedBlock">
        <span>Подсчитанные места</span>
        <div class="listElem">
            <?= $countedPlace ?> посадочных мест
        </div>
    </div>
</div>
