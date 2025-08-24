<?php
require __DIR__ . '/vendor/autoload.php';

use Packaged\Figlet\Figlet;

// Create a figlet object
$figlet = new Figlet();

// Render a string in ASCII art
echo $figlet->render("Hello World!");

?>
