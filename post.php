<?php

require_once("perfectMaze.php");
require_once("imperfectMaze.php");
require_once("printMaze.php");
error_reporting(E_ERROR | E_PARSE);

/*
define("wall", "<img src='https://user.oc-static.com/files/347001_348000/347995.png' style='width:20px; height: 20px;'>");
define("corridor", "<img src='https://s-media-cache-ak0.pinimg.com/originals/d6/c5/ad/d6c5ad469011e4b1ea38e0af687a53f2.jpg' style='width:20px; height: 20px;'>");
define("solution", "<img src='http://www.3d-diablotine.com/tuto/ground017_02.jpg' style='width:20px; height: 20px;'>");
define("back", "<img src='http://www.expertmultimedia.ch/ressources/graphisme-symboles-logos/symboles-1/carre-violet/image_preview' style='width:20px; height: 20px;'>");
*/

define("wall", "<img src='img/wall.png' style='width:20px; height: 20px;'>");
define("corridor", "<img src='img/corridor.jpg' style='width:20px; height: 20px;'>");
define("solution", "<img src='img/solution.jpg' style='width:20px; height: 20px;'>");
define("link", "<img src='img/link.jpg' style='width:20px; height: 20px;'>");
define("zelda", "<img src='img/zelda.png' style='width:20px; height: 20px;'>");
define("back", "<img src='http://www.expertmultimedia.ch/ressources/graphisme-symboles-logos/symboles-1/carre-violet/image_preview' style='width:20px; height: 20px;'>");

if($_POST['type'] == 'perfect'){
    perfectMaze(intval($_POST['height']), intval($_POST['width']));
}elseif($_POST['type'] == 'imperfect'){
    imperfectMaze(intval($_POST['height']), intval($_POST['width']));
}else{
    header("Location: choice.html");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A-MAZE-ING</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>

</body>
</html>
