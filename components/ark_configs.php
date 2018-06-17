<h2>Config-Files</h2>
<?php foreach (array('Game.ini', 'GameUserSettings.ini') as $config_filename) { ?>
    <div class="ark_config_file">
        <h3><?= $config_filename ?></h3>
        <div class="ark_config_file_container"><?= Ark::read_config($config_filename) ?></div>
    </div>
<?php } ?>