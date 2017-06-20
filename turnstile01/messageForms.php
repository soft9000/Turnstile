<?php

function getformRead() {
    $str = "";
    $str = $str . '<form action="turnstileMain.php" method="post">';
    $str = $str .  '<table>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="hidden" name="op" value="read"/>';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="id" value="0" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="submit" value="READ" />';
    $str = $str .  '</td></tr>';
    $str = $str .  '</table>';
    $str = $str .  '</form>';
    return $str;
}

function getformReadLive($id, $row) {
    $str = "";
    if ($id == null || $id < 1 || $row == null) {
        $str = $str .  "Error: Invalid data.";
        return;
    }
    $str = $str .  '<form action="turnstileMain.php" method="post">';
    $str = $str .  '<table>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="hidden" name="op" value="update"/>';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="hidden" name="id" value="' . $id . '" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="time" value="' . $row['time'] . '" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="title" value="' . $row['title'] . '" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="message" value="' . $row['message'] . '" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="submit" value="UPDATE" />';
    $str = $str .  '</td></tr>';
    $str = $str .  '</table>';
    $str = $str .  '</form>';
    return $str;
}

function getformDelete() {
    $str = "";
    $str = $str .  '<form action="turnstileMain.php" method="post">';
    $str = $str .  '<table>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="hidden" name="op" value="delete"/>';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="id" value="0" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="submit" value="DELETE" />';
    $str = $str .  '</td></tr>';
    $str = $str .  '</table>';
    $str = $str .  '</form>';
    return $str;
}

function getformCreate() {
    $str = "";
    $str = $str .  '<form action="turnstileMain.php" method="post">';
    $str = $str .  '<table>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="hidden" name="op" value="create"/>';
    $str = $str .  '</td></tr>';

    $time = time();
    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="time" value="' . $time . '" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="title" value="New Title" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="message" value="New Message" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="submit" value="CREATE" />';
    $str = $str .  '</td></tr>';
    $str = $str .  '</table>';
    $str = $str .  '</form>';
    return $str;
}

function getformUpdate() {
    $str = "";
    $str = $str .  '<form action="turnstileMain.php" method="post">';
    $str = $str .  '<table>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="hidden" name="op" value="update"/>';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="id" value="0" />';
    $str = $str .  '</td></tr>';

    $time = time();
    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="time" value="' . $time . '" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="title" value="" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="text" name="message" value="" />';
    $str = $str .  '</td></tr>';

    $str = $str .  '<tr><td>';
    $str = $str .  '<input type="submit" value="UPDATE" />';
    $str = $str .  '</td></tr>';
    $str = $str .  '</table>';
    $str = $str .  '</form>';
    return $str;
}

?>
