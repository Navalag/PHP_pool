<?php

include_once('Space.class.php');
include_once('Canvas.class.php');
include_once('BaseObject.class.php');
include_once('SpaceShip.class.php');

$width = 15;
$height = 10;

$game = new Space($width, $height);
$canvas = new Canvas($width, $height);
$ship = new SpaceShip(3, 0);

$game->draw($canvas);
$ship->draw($canvas);
// $canvas->draw();
$canvas->print_canvas();

$ship->moveDown();
$ship->move();

$game->draw($canvas);
$ship->draw($canvas);
$canvas->print_canvas();



?>
