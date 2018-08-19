<?php
$instance = (isset($instance) && $instance ? $instance : null);

if (is_null($instance)) {
    $instance = isset($_GET['instance']) && is_numeric($_GET['instance']) && $_GET['instance'] > 0 ? intval($_GET['instance']) : null;
}

if (!is_null($instance)) {
    $a_has_accss = false;
    if ($instance) {
        $a_has_accss = isset($_SESSION['instance_access_' . $instance]) ? boolval($_SESSION['instance_access_' . $instance]) : false;
        if (!$a_has_accss) {
            ?>
            <div class="access_grant" data-instance="<?= $instance ?>">
                Passwort: <input type="password" name="pw" /><input type="button" value="Instanz-Admin-Zugang" />
            </div>
            <?php
        }
    }
    ?>
    <div class="access_grant_info" <?= ($a_has_accss ? '' : ' style="display:none;" ') ?>>Du bist Instanz-Admin.</div>
    <?php
}
?>