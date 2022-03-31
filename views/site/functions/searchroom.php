<div class="twoBlockPage">
    <div class="backBlock">
<span>
    Выбрать подразделения
</span>
        <form method="get">
            <input type="hidden" name="formName" value="checkBoxes" >
            Написать вручную <br> <input class="siteInputArea" type="text" name="divisionTitle">
            <div>Выбрать из списка</div>
            <div>
                <ul>
                    <?php
                    foreach ($divisions as $division)
                    {
                        ?>
                        <li><div class="listElem">
                                <?= $division->title ?> <input type="checkbox" name="checkBoxForm[]" value="<?= $division->id ?>">
                            </div> </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <button class="sitebutton">
                Подсчитать
            </button>
        </form>
        <form method="get">
            <input type="hidden" name="formName" value="allChecked">
            <button class="sitebutton">
                Выбрать всё заведение
            </button>
        </form>

    </div>
    <div class="backBlock">
        <span>Найденные помещения</span>
        <div>
            <ul>
                <?php
                foreach ($rooms as $room)
                {
                    ?>
                    <li><div class="listElem">
                            <?= $room->Room_Number ?>
                        </div></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
