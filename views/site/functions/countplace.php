<div class="twoBlockPage">
    <div class="backBlock">
<span>
    <h3>Выбрать подразделения</h3>
</span>
        <form method="get">
            <input type="hidden" name="formName" value="filter" >
            Написать вручную <br> <input class="siteInputArea" type="text" name="divisionTitle" placeholder="Название подразделения">
            <button>
                🔍
            </button>
        </form>
        <form method="get">
            <input type="hidden" name="formName" value="checkBoxes">

            <div>Выбрать из списка</div>
            <div class="list">
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
        <h3><span>Подсчитанные места</span></h3>
        <div>
            <?= $countedPlace ?> посадочных мест
        </div>
    </div>
</div>
