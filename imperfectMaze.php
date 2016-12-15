<?php

define("wall", "<img src='img/wall.png' style='width:20px; height: 20px;'>");
define("corridor", "<img src='img/corridor.jpg' style='width:20px; height: 20px;'>");
define("solution", "<img src='img/solution.jpg' style='width:20px; height: 20px;'>");
define("link", "<img src='img/link.jpg' style='width:20px; height: 20px;'>");
define("zelda", "<img src='img/zelda.png' style='width:20px; height: 20px;'>");
define("back", "<img src='http://www.expertmultimedia.ch/ressources/graphisme-symboles-logos/symboles-1/carre-violet/image_preview' style='width:20px; height: 20px;'>");

require_once("printMaze.php");

function imperfectMaze($maze_height, $maze_width)
{
    $maze = array();
    $moves = array();
    for ($x = 0; $x < $maze_height; $x++)
        for ($y = 0; $y < $maze_width; $y++)
            $maze[$x][$y] = 1;

    $x = 1;
    $y = 1;
    $maze[$x][$y] = 0;
    array_push($moves, $y + ($x * 2));
    while (!empty($moves)) {
        $possible_directions = "";
        if ($maze[$x + 2][$y] == 1 and $x + 2 != $maze_height - 1) {
            $possible_directions .= "S";
        }
        if ($maze[$x][$y - 2] == 1 and $y - 2 != $maze_width - 1) {
            $possible_directions .= "O";
        }
        if ($maze[$x - 2][$y] == 1 and $x - 2 != $maze_height - 1) {
            $possible_directions .= "N";
        }
        if ($maze[$x][$y + 2] == 1 and $y + 2 != $maze_width - 1) {
            $possible_directions .= "E";
        }
        if ($possible_directions) {
            $randomMove = rand(0, strlen($possible_directions) - 1);
            if($possible_directions[$randomMove] == "S"){
                $maze[$x + 2][$y] = 0;
                $maze[$x + 1][$y] = 0;
                $x += 2;
            }elseif($possible_directions[$randomMove] == "O"){
                $maze[$x][$y - 2] = 0;
                $maze[$x][$y - 1] = 0;
                $y -= 2;
            }elseif($possible_directions[$randomMove] == "N"){
                $maze[$x - 2][$y] = 0;
                $maze[$x - 1][$y] = 0;
                $x -= 2;
            }elseif($possible_directions[$randomMove] == "E"){
                $maze[$x][$y + 2] = 0;
                $maze[$x][$y + 1] = 0;
                $y += 2;
            }
            array_push($moves, $y + ($x * 2));
        } else {
            $back = array_pop($moves);
            $x = floor($back / 2);
            $y = $back - ($x * 2);
        }
    }

    $maze[0][0] = 2;
    $maze[0][1] = 0;
    $maze[$maze_height - 2][$maze_width - 3] = 0;
    $maze[$maze_height - 2][$maze_width - 2] = 0;

    printMaze($maze, $maze_height, $maze_width);
    echo("<br>");
    $maze = imperfectMazeSolution($maze, $maze_height, $maze_width);
    printMaze($maze, $maze_height, $maze_width);
}

function imperfectMazeSolution($maze, $maze_height, $maze_width){
    $new_maze_height = $maze_height - 2;
    $new_maze_width = $maze_width - 2;

    $x = 0;
    $y = 0;

    while ($maze[$new_maze_height][$new_maze_width] != 2) {
        if ($maze[$x + 1][$y] === 0) {
            $maze[$x + 1][$y] = 2;
            $x++;
        } elseif ($maze[$x][$y + 1] === 0) {
            $maze[$x][$y + 1] = 2;
            $y++;
        } elseif ($maze[$x - 1][$y] === 0) {
            $maze[$x - 1][$y] = 2;
            $x--;
        } elseif ($maze[$x][$y - 1] === 0) {
            $maze[$x][$y - 1] = 2;
            $y--;
        } elseif ($maze[$x][$y - 1] === 2) {
            $maze[$x][$y] = 3;
            $y--;
        } elseif ($maze[$x][$y + 1] === 2) {
            $maze[$x][$y] = 3;
            $y++;
        } elseif ($maze[$x - 1][$y] === 2) {
            $maze[$x][$y] = 3;
            $x--;
        } elseif ($maze[$x + 1][$y] === 2) {
            $maze[$x][$y] = 3;
            $x++;
        }
    }
    return $maze;
}