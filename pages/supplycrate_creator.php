<?php $GLOBALS['nohtmlmin'] = true; ?>
<h1>SupplyCrate-Creator für ARK42-Server</h1>
<?php
#Presets:
$File_supplycrate_config = File::i('tmp/db/supplycrates/supplycrate_config.json');
$supplycrate_config = $File_supplycrate_config->get_json();
$File_supplycrate_presets = File::i('tmp/db/supplycrates/supplycrate_presets.json');
$supplycrate_presets = $File_supplycrate_presets->get_json();
echo '<script>var supplycrate_config=' . json_encode($supplycrate_config) . ';var supplycrate_presets=' . json_encode($supplycrate_presets) . ';</script>';
?>
<div class="supplycrate_creator">
    <ul class="scc_created"></ul>
    <form class="scc_form" name="supplycrateform">
        <h2>Supplycrate-Config erstellen</h2>
        <div class="scc_type scc_form_row">
            Type:
            <select name="type">
                <?php foreach ($supplycrate_config['supplycrates'] as $classname => $type) { ?>
                    <option value="<?= $classname ?>">Level: <?= $type['level'] ?></option>
                <?php } ?>
            </select>
        </div>
        <ul class="ssc_cratesets"></ul>
        <div class="scc_addset">
            <select></select>
            <button>Set Hinzufügen</button>
        </div>
        <div class="scc_preview scc_form_row"></div>
        <div class="scc_form_row scc_form_submit">
            <input type="submit" name="submit_x" value="Supplycrate Erstellen" />
        </div>
    </form>
    <form class="scc_form" name="supplycratesetform">
        <h2>Supplycrate-Set erstellen</h2>
        <div class="scc_set_name scc_form_row">
            Set-Name:
            <input name="set_name" value="Neues Set" />
        </div>
        <ul class="scc_set_items"></ul>
        <div class="scc_set_additem scc_form_row">
            <div class="scc_form_row">
                <select data-item-name="classname">
                    <?php foreach ($supplycrate_config['items'] as $classname => $item) { ?>
                        <option value="<?= $classname ?>"><?= $item['de'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="scc_form_row">
                Chance:
                <input type="range" min="1" max="1000" value="1000" data-item-name="chance" />
            </div>
            <div class="scc_form_row">
                Anzahl:
                <input type="number" min="1" max="1000" value="1" data-item-name="quantity" />
            </div>
            <div class="scc_form_row">
                Qualität:
                <input type="number" min="1" max="1000" value="1" data-item-name="quality_min" />
                -
                <input type="number" min="1" max="1000" value="1" data-item-name="quality_max" />
            </div>
            <div class="scc_form_row">
                <button>Item Hinzufügen</button>
            </div>
        </div>
        <div class="scc_form_row scc_form_submit">
            <input type="submit" name="submit_x" value="Set Erstellen" />
        </div>
    </form>
</div>