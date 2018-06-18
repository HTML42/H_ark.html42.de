<?php
echo File::i('components/admin/navi.php')->get_content();
$mods = IniFile::i('tmp/db/mods.ini')->get_ini();
$mods_ids = $mods;
foreach ($mods_ids as &$mod) {
    $mod = $mod['id'];
}
?>
<h1>Admin-Area | Mods</h1>
<input type="text" class="mods_id_string" value="<?= implode(',', $mods_ids) ?>" />
<ol>
    <?php foreach ($mods as $modname => $mod) { ?>
        <li>
            <h3><?= $modname ?></h3>
            <p><?= $mod['description_de'] ?></p>
            <a href="<?= $mod['link'] ?>" target="workshop">Zum Workshop</a>
        </li>
    <?php } ?>
</ol>