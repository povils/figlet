<?php

use Povils\Figlet\Figlet;

require('autoload.php');


$figlet = new Figlet();



$start = microtime(true);
for($i=0;$i<1; $i++){
    $figlet
        ->setFontStretching(5)
        ->setFontColor('light_green')
        ->write('Povils Figlet');
}
echo  microtime(true) - $start ."\n";





