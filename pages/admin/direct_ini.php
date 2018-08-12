<?php $GLOBALS['nohtmlmin'] = true; ?>
<?= File::i('components/admin/navi.php')->get_content() ?>
<h1>Complete Game.ini</h1>
<textarea><?php
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/Game.ini')->get_content();
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_engram_points.ini')->get_content();
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_engram_update.ini')->get_content();
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_harvest.ini')->get_content();
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_level.ini')->get_content();
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_Game_stats.ini')->get_content();
?></textarea>
<br/><br/><br/><hr /><br/><br/>
<h1>Complete GameUserSettings.ini</h1>
<textarea><?php
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/GameUserSettings.ini')->get_content();
echo File::instance(PROJECT_ROOT . 'tmp/db/defaults/_GameUserSettings_mods.ini')->get_content();
?></textarea>