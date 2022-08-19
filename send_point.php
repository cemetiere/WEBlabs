<?php
    $start_time = hrtime(true);

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
            $_SESSION['hit_message'] = 'Successful hit!';
        } else {
            $_SESSION['hit_message'] = 'Miss!';
        }

        $attempt = array(
            'x'=>$x,
            'y'=>$y,
            'r'=>$r,
            'hit'=>$hit,
            'attempt_time'=>time(),
            'process_time'=>(hrtime(true) - $start_time)/10000000
        );

        if (!isset($_SESSION['attempts'])) {
            $_SESSION['attempts'] = array($attempt);
        } else {
            array_push($_SESSION['attempts'], $attempt);
        }

        // Redirect back to home page
        header('Location: /');
    }
?>