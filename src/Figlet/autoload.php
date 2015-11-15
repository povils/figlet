<?php
/**
 * Created by PhpStorm.
 * User: povilas
 * Date: 15.10.18
 * Time: 12.01
 */

class Autoloader {
    static public function loader($className) {

        $filename = str_replace('\\', '/', $className) . ".php";

        $filename = str_replace('Povils/Figlet/', '', $filename);
        $filename = str_replace('Packaged/Figlet/', '', $filename);

        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return true;
            }
        }
        return false;
    }
}
spl_autoload_register('Autoloader::loader');