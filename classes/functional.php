<?php
function redirect($location)
{
    header('Location: ' . $location);
    die();
}
function pretty($array)
{
    echo '<pre>';
    print_r($array);
    echo "</pre>";
}
function setLimitString($string, $count = 10)
{
    if (strlen($string) > $count) {
        return substr($string, 0, $count) . "...";
    } else {
        return $string;
    }
}
