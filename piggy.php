<?php
function drawPig($canvas_width, $canvas_height, &$canvas){
    // Allocate colors
    $light_pink = imagecolorallocate($canvas, 248, 200, 220);
    $nose_pink = imagecolorallocate($canvas, 227, 115, 131);
    $dark_pink = imagecolorallocate($canvas, 129, 19, 49);

    $face_width = 300;
    $face_height = 300;
    //draw main face
    imagefilledellipse ($canvas, $canvas_width/2, $canvas_height/2, $face_width, $face_height, $light_pink);
    // draw the two ears
    $ear_one = [90, 90, 120, 200, 200, 120];
    $ear_two = [410, 90, 380, 200, 300, 120];
    imagefilledpolygon($canvas, $ear_one, 3, $light_pink);
    imagefilledpolygon($canvas, $ear_two, 3, $light_pink);
    
    //draw the nose
    $nose_width = 100;
    $nose_height = 75;
    imagefilledellipse($canvas, $canvas_width/2, $canvas_height/2+20, $nose_width, $nose_height, $nose_pink);

    //draw the two eye arcs
    imagearc($canvas, 200, 200, 50, 25, 180, 0, $dark_pink);
    imagearc($canvas, 300, 200, 50, 25, 180, 0, $dark_pink);

    //draw the nose holes
    imagefilledellipse($canvas, $canvas_width/2-10, $canvas_height/2+20, 10, 25, $dark_pink);
    imagefilledellipse($canvas, $canvas_width/2+10, $canvas_height/2+20, 10, 25, $dark_pink);
}

function drawBackGround($canvas_width, $canvas_height, &$canvas){
    $background = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $background);
    $yellow = imagecolorallocate($canvas, 255, 255, 0);
    $green = imagecolorallocate($canvas, 35, 155, 86);
    $purple = imagecolorallocate($canvas,128, 0, 128);

    //put random yellow squares on the background
    $x_max = 500;
    $y_max = 500;
    for($i = 0; $i < 20; $i++){
        $x1 = rand(0, $x_max);
        $y1 = rand(0, $y_max);
        $x2 = $x1+20;
        $y2 = $y1+20;
        imagerectangle ($canvas, $x1, $y1, $x2, $y2, $yellow);
    }
    for($i = 0; $i < 20; $i++){
        $x1 = rand(0, $x_max);
        $y1 = rand(0, $y_max);
        $x2 = $x1+20;
        $y2 = $y1+20;
        imagerectangle($canvas, $x1, $y1, $x2, $y2, $green);
    }
    for($i = 0; $i < 20; $i++){
        $x1 = rand(0, $x_max);
        $y1 = rand(0, $y_max);
        $x2 = $x1+20;
        $y2 = $y1+20;
        imagerectangle ($canvas, $x1, $y1, $x2, $y2, $purple);
    }

}

$canvas_width = 500;
$canvas_height = 500;
$canvas = imagecreatetruecolor($canvas_width, $canvas_height);
drawBackground($canvas_width, $canvas_height, $canvas);
drawPig($canvas_width, $canvas_height, $canvas);
header('Content-Type: image/jpeg');
imagejpeg($canvas);
imagedestroy($canvas);



?>