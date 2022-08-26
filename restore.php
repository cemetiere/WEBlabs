<?php
session_start();
$data = "[";
if (isset($_SESSION['attempts'])) {
    foreach ($_SESSION['attempts'] as $result) {
        $data .= $result;
        $data .= ",";
    }
    if (strcmp(substr($data, strlen($data)), ",")) {
        $data = substr($data, 0, -1);
    }
}
$data .= "]";
echo $data;