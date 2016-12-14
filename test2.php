<?php
error_reporting(E_ERROR | E_PARSE);

function perfectMaze($maze_height, $maze_width)
{
    $maze = array();
    $moves = array();
    for ($x = 0; $x < $maze_height; $x++) {
        for ($y = 0; $y < $maze_width; $y++) {
            $maze[$x][$y] = 1;
        }
    }
    $x_pos = 1;
    $y_pos = 1;
    $maze[$x_pos][$y_pos] = 0;
    array_push($moves, $y_pos + ($x_pos * 2));
    while (count($moves)) {
        var_dump($moves);

        $possible_directions = "";
        if ($maze[$x_pos + 2][$y_pos] == 1 and $x_pos + 2 != 0 and $x_pos + 2 != $maze_height - 1) {
            $possible_directions .= "S";
        }
        if ($maze[$x_pos - 2][$y_pos] == 1 and $x_pos - 2 != 0 and $x_pos - 2 != $maze_height - 1) {
            $possible_directions .= "N";
        }
        if ($maze[$x_pos][$y_pos - 2] == 1 and $y_pos - 2 != 0 and $y_pos - 2 != $maze_width - 1) {
            $possible_directions .= "W";
        }
        if ($maze[$x_pos][$y_pos + 2] == 1 and $y_pos + 2 != 0 and $y_pos + 2 != $maze_width - 1) {
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
            array_push($moves, $y_pos + ($x_pos * 2));
        } else {
            $back = array_pop($moves);
            $x_pos = floor($back / 2);
            $y_pos = $back - ($x_pos * 2);
        }
    }

    var_dump($moves);

    $maze[0][0] = 2;
    $maze[0][1] = 0;
    $maze[$maze_height - 2][$maze_width - 3] = 0;
    $maze[$maze_height - 2][$maze_width - 2] = 0;

    printMaze($maze, $maze_height, $maze_width);

    $maze = solution($maze, $maze_height, $maze_width);
    printMaze($maze, $maze_height, $maze_width);

}

function solution($maze, $maze_height, $maze_width){
    $new_maze_height = $maze_height - 2;
    $new_maze_width = $maze_width - 2;

    $x = 0;
    $y = 0;

    while ($maze[$new_maze_height][$new_maze_width] != 2) {

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
    }
    return $maze;
}