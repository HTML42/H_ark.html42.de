<?php

include SCRIPT_INCLUDES . 'classes/ark.class.php';
@session_start();

$admin_password = 'ARK42qwer!';

define('ADMINAREA', Request::$requested_clean_path_array[0] == 'admin');

define('IS_ADMIN', isset($_SESSION['admin']) && is_string($_SESSION['admin']) && $_SESSION['admin'] == date('Ymd'));

if (ADMINAREA && !IS_ADMIN) {
    $login = false;
    if(isset($_POST['pw']) && $_POST['pw'] == $admin_password) {
        $_SESSION['admin'] = date('Ymd');
        $login = true;
    }
    if (!$login) {
        echo '<h1>Admin-Area</h1>';
        echo '<form action="" method="post"><input type="password" name="pw" /><br/><input type="submit" value="Login" /></form>';
    } else {
        Utilities::redirect('index.html');
    }
    exit();
}

$path_to_ark = PROJECT_ROOT . 'tmp/';
if(is_file(PROJECT_ROOT . 'path_to_ark.conf')) {
    $path_to_ark = trim(file_get_contents(PROJECT_ROOT . 'path_to_ark.conf'));
}
define('DIR_ARK', $path_to_ark);

Ark::$path = DIR_ARK;