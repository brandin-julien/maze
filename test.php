<?php
error_reporting(E_ERROR | E_PARSE);

function perfectMaze($maze_height, $maze_width)
{
    //$maze_height = 100;
    //$maze_width = 100;
    $maze = array();
    $moves = array();
    $width = $maze_width;
    $height = $maze_height;
    for ($x = 0; $x < $height; $x++) {
        for ($y = 0; $y < $width; $y++) {
            $maze[$x][$y] = 1;
        }
    }
    $x_pos = 1;
    $y_pos = 1;
    $maze[$x_pos][$y_pos] = 0;
    array_push($moves, $y_pos + ($x_pos * $width));
    while (count($moves)) {
        $possible_directions = "";
        if ($maze[$x_pos + 2][$y_pos] == 1 and $x_pos + 2 != 0 and $x_pos + 2 != $height - 1) {
            $possible_directions .= "S";
        }
        if ($maze[$x_pos - 2][$y_pos] == 1 and $x_pos - 2 != 0 and $x_pos - 2 != $height - 1) {
            $possible_directions .= "N";
        }
        if ($maze[$x_pos][$y_pos - 2] == 1 and $y_pos - 2 != 0 and $y_pos - 2 != $width - 1) {
            $possible_directions .= "W";
        }
        if ($maze[$x_pos][$y_pos + 2] == 1 and $y_pos + 2 != 0 and $y_pos + 2 != $width - 1) {
            $possible_directions .= "E";
        }
        if ($possible_directions) {
            $move = rand(0, strlen($possible_directions) - 1);
            switch ($possible_directions[$move]) {
                case "N":
                    $maze[$x_pos - 2][$y_pos] = 0;
                    $maze[$x_pos - 1][$y_pos] = 0;
                    $x_pos -= 2;
                    break;
                case "S":
                    $maze[$x_pos + 2][$y_pos] = 0;
                    $maze[$x_pos + 1][$y_pos] = 0;
                    $x_pos += 2;
                    break;
                case "W":
                    $maze[$x_pos][$y_pos - 2] = 0;
                    $maze[$x_pos][$y_pos - 1] = 0;
                    $y_pos -= 2;
                    break;
                case "E":
                    $maze[$x_pos][$y_pos + 2] = 0;
                    $maze[$x_pos][$y_pos + 1] = 0;
                    $y_pos += 2;
                    break;
            }
            array_push($moves, $y_pos + ($x_pos * $width));
        } else {
            $back = array_pop($moves);
            $x_pos = floor($back / $width);
            $y_pos = $back % $width;
        }
    }

    $maze[0][0] = 2;
    $maze[0][1] = 0;
    $maze[$maze_height - 2][$maze_width - 3] = 0;
    $maze[$maze_height - 2][$maze_width - 2] = 0;


    $new_maze_height = $maze_height - 2;
    $new_maze_width = $maze_width - 2;

    $x = 0;
    $y = 0;

    while ($maze[$new_maze_height][$new_maze_width] != 2) {

        //if($maze[$x][$y] == 0){

        if ($maze[$x + 1][$y] == 0) {
            $maze[$x + 1][$y] = 2;
            $x++;
        } elseif ($maze[$x][$y + 1] == 0) {
            $maze[$x][$y + 1] = 2;
            $y++;
        } elseif ($maze[$x - 1][$y] == 0) {
            $maze[$x - 1][$y] = 2;
            $x--;
        } elseif ($maze[$x][$y - 1] == 0) {
            $maze[$x][$y - 1] = 2;
            $y--;
        } elseif ($maze[$x][$y - 1] == 2) {
            $maze[$x][$y] = 3;
            $y--;
        } elseif ($maze[$x][$y + 1] == 2) {
            $maze[$x][$y] = 3;
            $y++;
        } elseif ($maze[$x - 1][$y] == 2) {
            $maze[$x][$y] = 3;
            $x--;
        } elseif ($maze[$x + 1][$y] == 2) {
            $maze[$x][$y] = 3;
            $x++;
        }
        //}
        //printMaze($maze, $height, $width);
    }

    printMaze($maze, $height, $width);
}

function printMaze($maze, $height, $width)
{
    //define("wall", "<img src='https://image.freepik.com/icones-gratuites/forme-de-carre-noir_318-35701.jpg' style='width:20px; height: 20px;'>");
    define("wall", "<img src='https://user.oc-static.com/files/347001_348000/347995.png' style='width:20px; height: 20px;'>");
    //define("corridor", "<img src='http://www.normachats.fr/wp-content/uploads/2015/10/carr%C3%A9-blanc.png' style='width:20px; height: 20px;'>");
    define("corridor", "<img src='https://s-media-cache-ak0.pinimg.com/originals/d6/c5/ad/d6c5ad469011e4b1ea38e0af687a53f2.jpg' style='width:20px; height: 20px;'>");
    //define("solution", "<img src='http://les-nouveaux-voyageurs.com/wp-content/uploads/2015/01/carr%C3%A9-orange.png' style='width:20px; height: 20px;'>");
    define("solution", "<img src='http://www.3d-diablotine.com/tuto/ground017_02.jpg' style='width:20px; height: 20px;'>");
    define("back", "<img src='http://www.expertmultimedia.ch/ressources/graphisme-symboles-logos/symboles-1/carre-violet/image_preview' style='width:20px; height: 20px;'>");

    for ($x = 0; $x < $height - 1; $x++) {
        for ($y = 0; $y < $width - 1; $y++) {
            if ($maze[$x][$y] == 1) {
                //echo "#";
                echo(wall);
            } elseif ($maze[$x][$y] == 2)
                echo(solution);
            /*elseif ($maze[$x][$y] == 3)
                echo(back);
            */else {
                //echo "&nbsp;";
                echo(corridor);
            }
        }
        echo "<br>";
    }
    echo "</code>";
}
?>