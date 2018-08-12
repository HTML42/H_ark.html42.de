<div id="admin_navigation">
    <?php
    echo Html::ul(array(
        Html::link('index.html', 'Dashboard'),
        Html::link('server_settings.html', 'Server-Settings'),
        Html::link('direct_ini.html', 'INI-Files'),
        Html::link('mods.html', 'Mods')
    ));
    ?>
</div>