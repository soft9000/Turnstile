<?php

function HtmlHeader() {
    echo '<!DOCTYPE html>';
    echo "\n";
    echo '<head>';
    echo "\n";

    echo '<title>Turnstile - Version 0.001</title>';
    echo "\n";
    echo '<link rel="stylesheet" href="style.css"/>';
    echo "\n";
    echo '<link rel="shortcut icon" href="favicon.ico"/>';
    echo "\n";
    echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />';
    echo "\n";
    echo '</head>';
    echo "\n";
    echo '<html><body>';
    echo "\n";
}


function HtmlFooter() {
    echo "<br/><br/>\n";
    echo "\n<a href='https://github.com/soft9000/Turnstile/'>Soft9000.com Turnstile Project</a>";
    echo "\n";
    echo '</body>';
    echo '</html>';
    echo "\n";
}

?>
