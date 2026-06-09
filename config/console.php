<?php
function console_log($dados)
{
    $js_code = 'console.log(' . json_encode($dados) . ');';
    echo '<script>' . $js_code . '</script>';
}