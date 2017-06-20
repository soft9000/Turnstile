<?php

// turnstile.php - A human readable interface into the messages table.
include "showHistory.php";
include "showTurnstile.php";

$req = getRequest();
$id = $req['edit'];
if($id) {
    $form = showEditUpdate($id);
    showTurnstileWith($form);
    return;
}

showTurnstile();
?>
