<?php

include "showTurnstile.php";

$str = "";
$str = $str . '<form action="indexMain.php" method="post">';

$str = $str . '<table>';

$str = $str . '<tr><td>';
$str = $str . '<select name="op">';
$str = $str . '<option>create</option>';
$str = $str . '<option>read</option>';
$str = $str . '<option>update</option>';
$str = $str . '<option>delete</option>';
$str = $str . '<option>turnstile</option>';
$str = $str . '</select>';
$str = $str . '</td></tr>';

$str = $str . '<tr><td>';
$str = $str . '<input type="submit" value="SHOW" />';
$str = $str . '</td></tr>';

$str = $str . '</table>';
$str = $str . '</form>';


showTurnstileWith($str);
?>