<?php /** @noinspection ForgottenDebugOutputInspection */

$x = 4; //100
$y = 3; //011

$z = $x ^ $y; //111
var_dump($z); //7

$z ^= 4; //011

var_dump($z); //3