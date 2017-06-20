<?php

// 2017/06/17: Created by a heavy re-factoring of WebPing.php from 2015
include_once "skin.php";
include_once "messagePdo.php";
include_once "messageForms.php";


function turnstileTools() {
    echo '<table class="menubar" width="123">';
    echo "<tr><td><center>&nbsp;</center></td></tr>\n";
    echo "<tr><td class='menuitem'><center><a href='index.php'>[CRUD]</a></center></td></tr>\n";
    echo "<tr><td class='menuwarn'><center><a href='turnstileMain.php?control=delete'>[Delete All]</a></center></td></tr>\n";
    echo "<tr><td><center>&nbsp;</center></td></tr>\n";
    echo "<tr><td><center>&nbsp;</center></td></tr>\n";
    echo "<tr><td class='menuitem'><center><a href='turnstileMain.php?show=1'>[First]</a></center></td></tr>\n";
    echo "<tr><td class='menuitem'><center><a href='turnstileMain.php?control=last'>[Last]</a></center></td></tr>\n";
    echo "<tr><td><center>&nbsp;</center></td></tr>\n";
    echo '</table>';
}

function showEditUpdate($id) {
    $row = readRow($id);
    return getformReadLive($id, $row);
}

function showHistory($req) {
    $start = 1;
    $show = $req['show'];
    if ($show == null || $show < 1) {
        $start = 1;
    }
    $end = $start + 100;
    _showHistory($start, $end);
}

function mkLink($id) {
    return "<a href='turnstileMain.php?edit=$id'>Edit $id</a>";
}

function _showHistory($start, $end) {

    $bHasMore = false;
    $file_db = openPDO();
    $rows = $file_db->query("SELECT * FROM messages WHERE ID >= $start AND ID <= $end");
    if($rows->rowCount() > ($end - $start)) {
        $bHasMore = true;
    }

    echo '<table class="aqua">';
    $color = 'menuitem';
    echo "<tr>\n";
    echo "<th class=$color>ID</th>\n";
    echo "<th class=$color>IP ADDRESS</th>\n";
    echo "<th class=$color>ENTRY TIME</th>\n";
    echo "<th class=$color>SUBJECT</th>\n";
    echo "<th class=$color>MESSAGE</th>\n";
    echo "</tr>";
    $color = 'item_odd';
    $end = 0;
    foreach ($rows as $row) {
        $link = mkLink($row['id']);
        echo "<tr>\n";
        echo "<td class=$color>$link</td>\n";
        echo "<td class=$color>{$row['ip']}</td>\n";
        echo "<td class=$color>{$row['time']}</td>\n";
        echo "<td class=$color>{$row['title']}</td>\n";
        echo "<td class=$color>{$row['message']}</td>\n";
        echo "</tr>";
        if ($color == 'item_even') {
            $color = 'item_odd';
        } else {
            $color = 'item_even';
        }
        $end += 1;
    }
    echo '</table>';

    echo '<table>';
    echo "<tr><td>&nbsp;<a href='turnstileMain.php?show=1'>[Show First]</a>&nbsp;</td>\n";
    echo "<td>&nbsp;<a href='turnstileMain.php?control=last'>[Show Last]</a>&nbsp;</td>\n";
    if ($bHasMore == true) {
        echo "<td>&nbsp;<a href='turnstileMain.php?show=$end'>[Show Next]</a>&nbsp;</td>\n";
    } else {
        echo "<td>&nbsp;<a href='turnstileMain.php?show=$start'>[Refresh]</a>&nbsp;</td></tr>\n";
    }
    echo '</table>';
}

?>
