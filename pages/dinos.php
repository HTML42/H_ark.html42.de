<h1>Dino-Modifikationed auf ARK42-Server</h1>
<div>
    <a href="dinos_instance.html">Zu den Dino-Instanz-Status</a>
</div>
<?php
$game_ini_lines = explode("\n", File::i('tmp/db/defaults/Game.ini')->get_content());
foreach ($game_ini_lines as $index => $game_ini_line) {
    if (strstr($game_ini_line, 'DinoSpawnWeightMultipliers')) {
        preg_match('/DinoNameTag="(.+)"/isU', $game_ini_line, $dino_name);
        preg_match('/SpawnWeightMultiplier=(.+)[,\)]/isU', $game_ini_line, $dino_factor);
        echo '<p>';
        echo '<b>' . $dino_name[1] . ' => </b>&nbsp;&nbsp;&nbsp;';
        echo 'Spawnrate: ' . strval(floatval($dino_factor[1]) * 100) . '%';
        echo '</p>';
        echo '<hr/>';
    } else if (strstr($game_ini_line, 'TamedDinoClassDamageMultipliers')) {
        preg_match('/ClassName="(.+)"/isU', $game_ini_line, $dino_name);
        preg_match('/Multiplier=(.+)[,\)]/isU', $game_ini_line, $dino_factor);
        echo '<p>';
        echo '<b>' . $dino_name[1] . ' => </b>&nbsp;&nbsp;&nbsp;';
        echo 'DMG-Modifikation (Gezähmt): ' . strval(floatval($dino_factor[1]) * 100) . '%';
        echo '</p>';
        echo '<hr/>';
    } else if (strstr($game_ini_line, 'DinoClassDamageMultipliers')) {
        preg_match('/ClassName="(.+)"/isU', $game_ini_line, $dino_name);
        preg_match('/Multiplier=(.+)[,\)]/isU', $game_ini_line, $dino_factor);
        echo '<p>';
        echo '<b>' . $dino_name[1] . ' => </b>&nbsp;&nbsp;&nbsp;';
        echo 'DMG-Modifikation: ' . strval(floatval($dino_factor[1]) * 100) . '%';
        echo '</p>';
        echo '<hr/>';
    }
}
?>