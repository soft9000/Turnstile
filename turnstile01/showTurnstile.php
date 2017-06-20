<?php

include_once "showHistory.php";
include_once "doPostOp.php";

function showTurnstileWith($page) {
    HtmlHeader();
    $req = getRequest();
    echoHeader($req);
    echo $page;
    echoFooter();
    HtmlFooter();
}

function showTurnstile() {
    HtmlHeader();
    $req = getRequest();
    echoHeader($req);

    $control = $req['control'];
    if ($control) {
        doControl($control);
    } else {
        $br = doPostOp($req);
        if ($br == false) {
            $edit = $req['edit'];
            if ($edit) {
                showEditUpdate($edit);
            } else {
                showHistory($req);
            }
        }
    }

    echoFooter();
    HtmlFooter();
}

function echoFooter() {
    echo '</td>';
    echo '</tr>';
    echo '</table>';
}

function echoHeader($req) {
    echo '<table>';
    echo '<tr>';
    echo "<td>";
    $time = time();
    echo '<td>Turnstile Server</td><td>[' . $time . ']</td>';
    $ip = $req['ip'];
    echo "<td></td><td><b>IP Address= $ip</b></td>";
    echo "</td>";
    echo '</tr>';

    echo '<tr valign="top">';
    echo '<td valign="top">';
    echo turnstileTools();
    echo '</td>';
    echo '<td>';
}

?>
