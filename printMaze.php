<?php

function printMaze($maze, $maze_height, $maze_width)
{
    for ($x = 0; $x < $maze_height - 1; $x++) {
        for ($y = 0; $y < $maze_width - 1; $y++) {
            if ($maze[$x][$y] == 1) {
                echo(wall);
            } elseif ($maze[$x][$y] == 2)
                echo(solution);
            else {
                echo(corridor);
            }
        }
        echo "<br>";
    }
}