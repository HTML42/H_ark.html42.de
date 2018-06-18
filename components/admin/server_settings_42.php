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