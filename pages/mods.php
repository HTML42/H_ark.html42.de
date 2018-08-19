<h1>Genutzte Mods auf ARK42-Server</h1>
<?php $mods = IniFile::i('tmp/db/mods.ini')->get_ini() ?>

<ol>
    <?php foreach ($mods as $modname => $mod) { ?>
        <li>
            <h3><?= $modname ?></h3>
            <p><?= $mod['description_de'] ?></p>
            <a href="<?= $mod['link'] ?>" target="workshop">Zum Workshop</a>
        </li>
    <?php } ?>
</ol>