<?php

include "skin.php";

HtmlHeader();

echo '<form action="apiMain.php" method="post">';
echo '<table>';

echo '<tr><td>';
echo '<select name="op">';
echo '<option>create</option>';
echo '<option>read</option>';
echo '<option>update</option>';
echo '<option>delete</option>';
echo '<option>list</option>';
echo '</select>';
echo '</td></tr>';

echo '<tr><td>';
echo '<input type="text" name="id" value="0" />';
echo '</td></tr>';

$time = time();
echo '<tr><td>';
echo '<input type="text" name="time" value="' . $time . '" />';
echo '</td></tr>';

echo '<tr><td>';
echo '<input type="text" name="title" value="New Title" />';
echo '</td></tr>';

echo '<tr><td>';
echo '<input type="text" name="message" value="New Message" />';
echo '</td></tr>';

echo '<tr><td>';
echo '<input type="submit" value="Okay" />';
echo '</td></tr>';
echo '</table>';
echo '</form>';

HtmlFooter();



?>
