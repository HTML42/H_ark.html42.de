<?= File::i('components/admin/navi.php')->get_content() ?>
<h1>Admin-Area | Server-Settings</h1>
<?php if (isset($_GET['ini']) && strlen($_GET['ini']) > 2) { ?>
    <div class="settings">
        <?php $ini_filename = trim($_GET['ini']); ?>
        <?php if ($ini_filename == 'ark42') { ?>
            <?php $ini_game = Ark::read_ini('Game.ini') ?>
            <?php $ini_gameuser = Ark::read_ini('GameUserSettings.ini') ?>
            <?php $ini_a42 = Ark::read_ini('A42.ini') ?>
            <h2>ARK42-ServerSettings</h2>
            <fieldset>
                <legend>Main</legend>
                <ul>
                    <li>
                        <div class="setting_key">Servername</div>
                        <div class="setting_value">
                            <input type="text" value="<?= $ini_gameuser['SessionSettings']['SessionName'] ?>" name="SessionSettings[SessionName]" />
                        </div>
                    </li>
                    <li>
                        <div class="setting_key">Enhancement Start</div>
                        <div class="setting_value">
                            <input type="date" value="<?= date('Y-m-d', strtotime($ini_a42['EnhancementStart'])) ?>" name="A42[EnhancementStart]" />
                        </div>
                    </li>
                    <li>
                        <div class="setting_key">Enhancement per day (in %)</div>
                        <div class="setting_value">
                            <input type="text" value="<?= $ini_a42['EnhancementPerDay'] ?>" name="A42[EnhancementPerDay]" />
                        </div>
                    </li>
                    <li>
                        <div class="setting_key">Enhancement-Parameters</div>
                        <div class="setting_value">
                            <div class="option_row">
                                <label>
                                    <input type="checkbox" name="A42[EnhancementParameters][resources]"
                                           <?= ($ini_a42['EnhancementParameters']['resources'] ? ' checked' : '') ?> />
                                    Resources
                                </label>
                            </div>
                            <div class="option_row">
                                <label>
                                    <input type="checkbox" name="A42[EnhancementParameters][difficult]"
                                           <?= ($ini_a42['EnhancementParameters']['difficult'] ? ' checked' : '') ?> />
                                    Difficult
                                </label>
                            </div>
                            <div class="option_row">
                                <label>
                                    <input type="checkbox" name="A42[EnhancementParameters][spoiltimer]"
                                           <?= ($ini_a42['EnhancementParameters']['spoiltimer'] ? ' checked' : '') ?> />
                                    Spoiltimer
                                </label>
                            </div>
                            <div class="option_row">
                                <label>
                                    <input type="checkbox" name="A42[EnhancementParameters][weight]"
                                           <?= ($ini_a42['EnhancementParameters']['weight'] ? ' checked' : '') ?> />
                                    Attribute-Weight
                                </label>
                            </div>
                        </div>
                    </li>
                </ul>
            </fieldset>
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
                    <li>
                        <a href="server_settings.html?ini=ark42">ARK42-Settings</a>
                    </li>
                </fieldset>
            <?php } ?>
        <?php } ?>
    </div><?php } else { ?>

    <ul>
        <li>
            <a href="server_settings.html?ini=Game">Game.ini</a>
        </li>
        <li>
            <a href="server_settings.html?ini=GameUserSettings">GameUserSettings.ini</a>
        </li>
    </ul>
<?php } ?>

