<?= File::i('components/admin/navi.php')->get_content() ?>
<h1>Admin-Area | Server-Settings</h1>

<?php if (isset($_GET['ini']) && strlen($_GET['ini']) > 2) { ?>
    <div class="settings">
        <?php $ini_filename = trim($_GET['ini']); ?>
        <?php if ($ini_filename == 'ark42') { ?>
            <?= File::i('components/admin/server_settings_42.php')->get_content() ?>
        <?php } else { ?>
            <?php $current_ini = Ark::read_ini($ini_filename); ?>
            <?php foreach ($current_ini as $groupname => $group_data) { ?>
                <fieldset>
                    <legend><?= $groupname ?></legend>
                    <ul>
                        <?php foreach ($group_data as $setting_key => $setting_value) { ?>
                            <li>
                                <div class="setting_key"><?= $setting_key ?></div>
                                <div class="setting_value">
                                    <?php if (is_bool($setting_value)) { ?>
                                        <input type="checkbox" <?= $setting_value ? ' checked' : '' ?> name="<?= $setting_key ?>" />
                                    <?php } else { ?>
                                        <input type="text" value="<?= $setting_value ?>" name="<?= $setting_key ?>" />
                                    <?php } ?>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </fieldset>
            <?php } ?>
        <?php } ?>
    </div>
<?php } else { ?>

    <ul>
        <li>
            <a href="server_settings.html?ini=ark42">ARK42-Settings</a>
        </li>
        <li>
            <a href="server_settings.html?ini=Game">Game.ini</a>
        </li>
        <li>
            <a href="server_settings.html?ini=GameUserSettings">GameUserSettings.ini</a>
        </li>
    </ul>
<?php } ?>

