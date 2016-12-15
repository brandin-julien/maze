<?php

function printMaze($maze, $maze_height, $maze_width)
{

    $maze[0][0] = 'link';
    $maze[$maze_height - 2][$maze_width - 2] = 'zelda';

    for ($x = 0; $x < $maze_height - 1; $x++) {
        for ($y = 0; $y < $maze_width - 1; $y++) {
            if ($maze[$x][$y] === 1)
                echo(wall);
            elseif ($maze[$x][$y] === 2)
                echo(solution);
            elseif ($maze[$x][$y] === 'link')
                echo(link);
            elseif ($maze[$x][$y] === 'zelda')
                echo(zelda);
            else
                echo(corridor);
        }
        echo "<br>";
    }
}