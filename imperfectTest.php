<?php
//error_reporting(E_ERROR | E_PARSE);

function imperfectMaze($maze_height, $maze_width)
{
    $mazeMap = array();
    for ($x = 0; $x < $maze_height; $x++) {
        for ($y = 0; $y < $maze_width; $y++) {
            $mazeMap[$x][$y] = rand(0, 1);
        }
    }

    $mazeMap[0][0] = 2;
    $mazeMap[$maze_height - 1][$maze_width - 1] = 0;
    $moves = array();
    array_push($moves, 1 + (1 * $maze_width));

    $x = 0;
    $y = 0;

    $directionArray = ["S", "E"];

    $finish = false;

    while (!$finish) {

        $randomNumber = rand(0, 1);

        switch ($directionArray[$randomNumber]) {
            case "S":
                if ($x > $maze_height)
                    $x = $maze_height - 1;
                $mazeMap[$x + 1][$y] = 2;
                $x += 1;
                break;
            case "E":
                if ($y > $maze_width)
                    $y = $maze_width - 1;
                $mazeMap[$x][$y + 1] = 2;
                $y += 1;
                break;
        }

        if ($mazeMap[$maze_height - 1][$maze_width - 1] == 2) {
            $finish = true;
        }

        if ($x > $maze_height + 1 && $y > $maze_width + 1) {
            break;
        }

        if ($x >= $maze_height) {
            $x -= 1;
        }

        if ($y >= $maze_width) {
            $y -= 1;
        }
    }

    printLaby($mazeMap);
}

function printLaby($mazeMap){

    $maze_width = sizeof($mazeMap[0]);
    $maze_height = sizeof($mazeMap);

    for($x=0;$x<$maze_height-1;$x++){
        for($y=0;$y<$maze_width-1;$y++){
            if($mazeMap[$x][$y] == 1)
                echo(wall);
            elseif($mazeMap[$x][$y] == 2)
                echo(solution);
            else
                echo(corridor);
        }
        echo("<br>");
    }
}
?>