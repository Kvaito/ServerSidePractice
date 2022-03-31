<div class="twoBlockPage">
    <div class="backBlock">
<span>
    <h3>Выбрать подразделения</h3>
</span>
        <form method="get">
            <input type="hidden" name="formName" value="filter" >
            Написать вручную <br>
            <input class="siteInputArea" type="text" name="divisionTitle" placeholder="Название подразделения">
            <button>
                🔍
            </button>
        </form>
        <form method="get">
            <input type="hidden" name="formName" value="checkBoxes" >
            <div>Выбрать из списка</div>
            <div class="list">
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
        <h3><span>Найденные помещения</span></h3>
        <div class="list">
            <ul>
                <?php
                foreach ($rooms as $room)
                {
                    ?>
                    <li><div class="listElem">
                            <?= $room['Room_Number'] ?>
                        </div></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
