<?php

App::$response_base = 'components/html_base_clean.php';

$pw = validate($_POST['pw']);
$instance = validate($_POST['instance'], true);

$passwords = array(
    1 => 'ark42!'
);

if (isset($passwords[$instance]) && $pw == $passwords[$instance]) {
    $_SESSION['instance_access_' . $instance] = true;
    echo 1;
} else {
    echo 0;
}

function validate($input, $as_int = false) {
    $input = stripslashes($input);
    $input = strip_tags($input);
    $input = trim($input);
    if ($as_int) {
        $input = intval($input);
    }
    return $input;
}
