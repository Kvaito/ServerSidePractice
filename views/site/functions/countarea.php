<div class="twoBlockPage">
    <div class="backBlock">
<span>
    Выбрать помещения
</span>
        <form method="get" name="countAreaForm">
            <input type="hidden" name="formName" value="checkboxes">
            Номер помещения <br> <input class="siteInputArea" type="text" name="roomnumber">
            <div>
                <ul>
                    <?php
                    foreach ($rooms as $room)
                    {
                        ?>
                        <li><div class="listElem" style="height: 50px">
                                <?= $room->Room_Number ?><br>
                                <?= $room->Type?>
                                <input type="checkbox" name="checkBoxForm[]" value="<?= $room->id ?>">
                            </div></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <button class="sitebutton">
                Подсчитать
            </button>
        </form>

        <form>
            <input type="hidden" name="formName" value="allChecked">
            <button class="sitebutton">
                Выбрать всё заведение
            </button>
        </form>

    </div>
    <div class="countedBlock">
        <span>Подсчитанная площадь</span><br>
        <div class="listElem">
            <?= $countedArea ?> м²
        </div>

    </div>
</div>