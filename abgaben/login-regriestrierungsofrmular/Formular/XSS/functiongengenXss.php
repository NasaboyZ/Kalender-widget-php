<?php
//verhindert das schreiben von html tags in meine formular
function e($html){
    return htmlspecialchars($html, ENT_QUOTES, 'UTF-8');
}
?>
