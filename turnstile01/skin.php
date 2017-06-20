<?php

function HtmlHeader() {
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
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
    echo "\n<a href='https://github.com/soft9000/turnstile/'>Soft9000.com Turnstile Project</a>";
    echo "\n";
    echo '</body>';
    echo '</html>';
    echo "\n";
}

?>
