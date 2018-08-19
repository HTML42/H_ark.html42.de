<?php $GLOBALS['nohtmlmin'] = true; ?>
<?= File::i('components/admin/navi.php')->get_content() ?>
<h1>Complete Game.ini</h1>
<textarea style="width: 100%;height: 100px;" id="ini_game"><?php
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/Game.ini')->get_content() . "\n";
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_engram_points.ini')->get_content() . "\n";
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_engram_update.ini')->get_content() . "\n";
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_harvest.ini')->get_content() . "\n";
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_level.ini')->get_content() . "\n";
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_stats.ini')->get_content() . "\n";
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_supplycrates.ini')->get_content() . "\n";
?></textarea>
<button onclick="copy_el('ini_game')">Copy to Clipboard</button>
<br/><br/><br/><hr /><br/><br/>
<h1>Complete GameUserSettings.ini</h1>
<textarea style="width: 100%;height: 100px;" id="ini_gameusersettings"><?php
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/GameUserSettings.ini')->get_content() . "\n";
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_GameUserSettings_mods.ini')->get_content() . "\n";
?></textarea>
<button onclick="copy_el('ini_gameusersettings')">Copy to Clipboard</button>
<script>
function copy_el(el_id) {
    document.getElementById(el_id).select();
    document.execCommand('copy');
    ocument.getElementById(el_id).blur();
}
</script>