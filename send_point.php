<?php
    $start = microtime(true);
    date_default_timezone_set('Europe/Moscow');

    if (!(isset($_POST['x']) && isset($_POST['y']) && isset($_POST['r']))) {
        echo 'Not enough parameters';
        http_response_code(400);
    } else {
        $x = floatval($_POST['x']);
        $y = floatval($_POST['y']);
        $r = floatval($_POST['r']);

        $hit = false;

        if ($x >= 0) {
            if ($y >= 0) {
                // Circle with radius r
                $rr = sqrt($x*$x + $y*$y);
                $hit = $rr <= $r;
            } else {
                // triangle
                $hit = ($x <= $r/2) && ($y >= -$r);
            }
        } else {
            if ($y >= 0) {
                $hit = $y <= ($x * 1/2 + $r/2);
            } else {
                $hit = false;
            }
        }

        session_start();

        if ($hit) {
            $hitFact = 'true';
        } else {
            $hitFact = 'false';
        }


        $attempt_time = date('m/d/Y h:i:s a', time());;
        $process_time = number_format(microtime(true) - $start, 8, '.', '');
        // $data = array(
        //     'x'=>$x,
        //     'y'=>$y,
        //     'r'=>$r,
        //     'hit'=>$hitFact,
        //     'attempt_time'=>$attempt_time,
        //     'process_time'=>$process_time
        // );

        $data = "{" .
            "\"x\":\"$x\"," .
            "\"y\":\"$y\"," .
            "\"r\":\"$r\"," .
            "\"hit\":\"$hitFact\"," .
            "\"attempt_time\":\"$attempt_time\"," .
            "\"process_time\":\"$process_time\"" .
            "}";

        if (!isset($_SESSION['attempts'])) {
            $_SESSION['attempts'] = array($data);
        } else {
            array_push($_SESSION['attempts'], $data);
        }
        echo($data);

        // // Redirect back to home page
        // header('Location: /');
    }
?>