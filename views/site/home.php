<div class="twoBlockPage">
    <div class="backBlock">
        <div><h3>Информация о пользователе</h3></div>
        <div>
            <img style="height: 70px;width:70px" alt="userAvatar" src="/public/img/<?= app()->auth::user()->id_role ?>.jpg">
        </div>
        <div>
            <span>Имя</span><br>
            <span><?= app()->auth::user()->name ?></span>
        </div>
        <div>
            <span>Номер заведения</span><br>
            <span><?php echo $institute[0]->number ?></span>
        </div>
        <div>
            <span>Локация</span><br>
            <span><?php echo $institute[0]->location ?></span>
        </div>
        <div>
            <span>Роль</span><br>
            <span><?php
                if(app()->auth::user()->id_role == 1)
                {
                    echo 'Сотрудник';
                }
                else{
                    echo 'Администратор';
                }
                ?></span>
        </div>
    </div>
    <div id="homePageButtons">
        <div class="sitebutton">
            <a href="<?= app()->route->getUrl('/studyrooms/searchroom') ?>">Просмотр помещений</a>
        </div>
        <div class="sitebutton">
            <a href="<?= app()->route->getUrl('/studyrooms/countarea') ?>">Подсчёт площади</a>
        </div>
        <div class="sitebutton">
            <a href="<?= app()->route->getUrl('/studyrooms/countplace') ?>">Подсчёт мест</a>
        </div>
        <?php
        if(app()->auth::user()->id_role == 2)
        {
            echo '
         <div class="sitebutton">
            <a href="'.app()->route->getUrl('/studyrooms/adminpage').'">Панель администратора</a>
        </div> ';
        }
        ?>

    </div>
</div>