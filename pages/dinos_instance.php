<?php $GLOBALS['nohtmlmin'] = true; ?>
<h1>Dino Status auf einer bestimmten Instanz</h1>
<?php
include File::i('components/access_instance.php')->path;
$File_dinos_config = File::i('tmp/db/dinos.json');
$dinos_config = $File_dinos_config->get_json();
$File_catched = File::i('db/catched/instance_' . $instance . '.json');
$catched = $File_catched->exists ? $File_catched->get_json() : array();

if ($instance && $instance > 0) {
    echo File::i('components/dinos/dinos_list.html')->get_content();
    ?>
    <input type="hidden" name="instance" value="<?= $instance ?>" />

<?php } else { ?>
    <form action="dinos_instance.html" method="get">
        <p>Bitte geben sie die Instanz-Nummer ein:</p>
        <div>
            <input type="number" name="instance" value="1" />
        </div>
        <div class="submit_row">
            <button>
                Dinos dieser Instanz anzeigen
            </button>
        </div>
    </form>
<?php } ?>
