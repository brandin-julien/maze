<?php
//error_reporting(E_ERROR | E_PARSE);

// help
// generate solution down and left
// merge with random maze
/*
define("wall", "<img src='https://image.freepik.com/icones-gratuites/forme-de-carre-noir_318-35701.jpg' style='width:20px; height: 20px;'>");
define("corridor", "<img src='http://www.normachats.fr/wp-content/uploads/2015/10/carr%C3%A9-blanc.png' style='width:20px; height: 20px;'>");
define("solution", "<img src='http://les-nouveaux-voyageurs.com/wp-content/uploads/2015/01/carr%C3%A9-orange.png' style='width:20px; height: 20px;'>");
*/
function imperfectMaze($maze_height, $maze_width)
{

    //$maze_height = 20;
    //$maze_width = 20;
    $mazeMap = array();
    for ($x = 0; $x < $maze_height; $x++) {
        for ($y = 0; $y < $maze_width; $y++) {
            //$mazeMap[$x][$y]=1;
            $mazeMap[$x][$y] = rand(0, 1);
        }
    }

//var_dump($mazeMap);

    $mazeMap[0][0] = 2;
    $mazeMap[$maze_height - 1][$maze_width - 1] = 0;
    $moves = array();
    array_push($moves, 1 + (1 * $maze_width));

    $x = 0;
    $y = 0;

    $directionArray = ["S", "E"];

    $finish = false;

//while($x <= $maze_height -1 || $y <= $maze_width - 1){
//while(count($moves)){
    while (!$finish) {

        $randomNumber = rand(0, 1);

        //var_dump($directionArray[$randomNumber]);

        switch ($directionArray[$randomNumber]) {
            case "S":
                //if($mazeMap[$x-2][$y]==1 && $x-2!=0 && $x-2!=$maze_height-1) {
                //if($mazeMap[$x+2][$y]==1 && $x+2!=0 && $x+2!=$maze_height-1) {
                //$mazeMap[$x + 2][$y] = 2;
                if ($x > $maze_height)
                    $x = $maze_height - 1;
                $mazeMap[$x + 1][$y] = 2;
                //$x += 2;
                $x += 1;
                //}
                break;
            case "E":
                //if($mazeMap[$x][$y+2]==1 && $y+2!=0 && $y+2!=$maze_width-1) {
                //$mazeMap[$x][$y + 2] = 2;
                if ($y > $maze_width)
                    $y = $maze_width - 1;
                $mazeMap[$x][$y + 1] = 2;
                //$y += 2;
                $y += 1;
                //}
                break;
        }

        //if($x >= $maze_height && $y >= $maze_width){
        if ($mazeMap[$maze_height - 1][$maze_width - 1] == 2) {
            $finish = true;
        }


        if ($x > $maze_height + 1 && $y > $maze_width + 1) {
            //printLaby($mazeMap);
            echo("exit");
            break;
        }

        //var_dump($x . "   " . $y);
        //printLaby($mazeMap);
        if ($x >= $maze_height) {
            $x -= 1;
        }

        if ($y >= $maze_width) {
            $y -= 1;
        }

        //$x++;
        //$y++;
    }

//var_dump($x);
//var_dump($y);

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