<div class="twoBlockPage">
    <div class="backBlock">
<span>
    <h3>Выбрать помещения</h3>
</span>
        <form method="get">
            <input type="hidden" name="formName" value="filter" >
            <br> <input class="siteInputArea" type="text" name="roomnumber" placeholder="Номер помещения">
            <button>
                🔍
            </button>
        </form>
        <form method="get" name="countAreaForm">
            <input type="hidden" name="formName" value="checkboxes">
            <div class="list" style="overflow:scroll;
    height:400px;">
                <ul>
                    <?php
                    foreach ($rooms as $room)
                    {
                        ?>
                        <li><div class="listElem" style="height: 50px">
                                <?= $room['Room_Number'] ?><br>
                                <?= $room['Type']?>
                                <input type="checkbox" name="checkBoxForm[]" value="<?= $room['id'] ?>">
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
        <h3><span>Подсчитанная площадь</span></h3><br>
        <div style="background-color: background-color:#BC8F8F;">
            <?= $countedArea ?> м²
        </div>

    </div>
</div>