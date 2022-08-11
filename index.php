<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Work #1</title>
    <link href="css/style.css" rel="stylesheet">
    <script defer src="js/validation.js"></script>

</head>

<body>
    
    <table class="main-panel-table" cellpadding="0" cellspacing="0" height="100%" width="100%" border="0">
        <tr  style="background-image: url(img/bg2.gif);background-repeat: no-repeat; background-position: top center;background-size: cover;">
            <td>
                <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                    <tr>
                        <td colspan="4">
                            <header>
                                <h2 class="headText">Кириллов Андрей</h2>
                                <h3 class="headText">Группа P3130 | Вариант 3008</h3>
                            </header>
                        </td>
                    </tr>
                    <main>
                        <tr>
                            <td class="sidePanel" width="20%" rowspan="2"></td>
                            <td>
                                <table class="forms" border="0">
                                    <form id="form" action="send_point.php" method="POST">
                                        <input autocomplete="off" id="xValue" name="x" type="hidden" value="">
                                        <input autocomplete="off" id="xFromClick" name="x" type="hidden" value="">
                                        <tr>
                                            <td colspan="2">
                                                <div class="taskText">
                                                    Введите данные на проверку вхождения в область значений данного графика:
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!-- X panel -->
                                            <td width="50%">
                                                <div class="taskRect">
                                                    <table class="XButtons">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <h3 class="letter">X</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <button  value="-3" name="x" type="button" >-3</button>
                                                                </td>
                                                                <td>
                                                                    <button  value="-2" name="x" type="button">-2</button>
                                                                </td>
                                                                <td>
                                                                    <button  value="-1" name="x" type="button">-1</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <button  value="0" name="x" type="button">0</button>
                                                                </td>
                                                                <td>
                                                                    <button  value="1" name="x" type="button">1</button>
                                                                </td>
                                                                <td>
                                                                    <button  value="2" name="x" type="button">2</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <button  value="3" name="x" type="button">3</button>
                                                                </td>
                                                                <td>
                                                                    <button  value="4" name="x" type="button">4</button>
                                                                </td>
                                                                <td>
                                                                    <button  value="5" name="x" type="button">5</button>
                                                                </td>
                                                            </tr>
                                                            <script>
                                                                var a = document.querySelectorAll('.XButtons button');
                                                                [].forEach.call(a, function (el) {
                                                                    el.onclick = function (e) {
                                                                        var b = document.querySelectorAll('.XButtons button');
                                                                        [].forEach.call(b, function (el) {
                                                                            el.style.background = "#ffffffcc";
                                                                        });
                                                                        (this).style.background = "violet";
                                                                        document.getElementById("xValue").value = this.value;
                                                                        valid();
                                                                    }
                                                                });
                                                            </script>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                            <!-- R panel -->
                                            <td>
                                                <div class="taskRect">
                                                    <input autocomplete="off" id="rValue" name="r" type="hidden" value="">
                                                    <table class="RButtons">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <h3 class="letter">R</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <button  value="1"  name="r" type="button">1</button>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                    <button  value="1.5" name="r" type="button">1.5</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                    <button  value="2" name="r" type="button">2</button>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <button  value="2.5" name="r" type="button">2.5</button>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                                    <button  value="3" name="r" type="button">3</button>
                                                                </td>
                                                            </tr>
                                                            <script>
                                                                var a = document.querySelectorAll('.RButtons button');
                                                                [].forEach.call(a, function (el) {
                                                                    el.onclick = function (e) {
                                                                        var b = document.querySelectorAll('.RButtons button');
                                                                        [].forEach.call(b, function (el) {
                                                                            el.style.background = "#ffffffcc";
                                                                        });
                                                                        (this).style.background = "violet";
                                                                        document.getElementById("rValue").value = this.value;
                                                                        valid();
                                                                    }
                                                                });
                                                            </script>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Y panel -->
                                        <tr>
                                            <td colspan="2" style="text-align: center;">
                                                <div class="YtaskRect">
                                                    <!-- <span class="Y-letter">Y</span> -->
                                                    <h3 for="y" class="letter">Введите Y:</h3>
                                                    <input autocomplete="off" class="inputY" id="y" maxlength="8" name="y"
                                                        placeholder="Введите число от -3 до 3"
                                                        style="border: 2px solid #d0d1c7; text-align: center;  position: relative;"
                                                        title="Введите число" type="text">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Submit  -->
                                        <tr>
                                            <td colspan="2" style="text-align: center;">
                                                <input id="submitButton" disabled="true" type="submit">
                                            </td>
                                        </tr>
                                    </form>
                                </table>
                            </td>
                            <td class="sidePanel" width="20%" rowspan="2"></td>
                        </tr>
                        <!-- Canvas and sexy tyanka -->
                        <tr>
                            <td>
                                <div class="imgTyanPanel">
                                    <canvas id="graph" width="300" height="300"></canvas>
                                    <script src="js/graph.js"></script>
                                    <img class="tyanImg" src="img/mainGirl.webp" onmouseover="this.src = 'img/girlOnMouseMove.webp'" onmouseout="this.src = 'img/mainGirl.webp'" alt="tyan" width="300" height="300" align="right">
                                </div>
                            </td>

                        </tr>
                    </main>
                </table>
            </td>
        </tr>

            <tr>
                <td colspan="3">
                    <table class='resultTable' border="1" width="100%">
                        <tr>
                            <th>Попытка №</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Результат</th>
                            <th>Время</th>
                            <th>Время работы</th>
                        </tr>
                        <?php
                            if (isset($_SESSION['attempts'])) {
                                foreach($_SESSION['attempts'] as $index=>$attempt) {
                                    echo('<tr>');
                                    
                                    printf('<td>%s</td>', $index+1);

                                    printf('<td>%s</td>', $attempt['x']);
                                    printf('<td>%s</td>', $attempt['y']);
                                    printf('<td>%s</td>', $attempt['r']);

                                    if ($attempt['hit']) {
                                        echo('<td class="theme-color">HIT</td>');
                                    } else {
                                        echo('<td class="warning">MISS</td>');
                                    }

                                    printf('<td>%s</td>', date('Y-m-d H:i:s', $attempt['attempt_time']) . ' UTC');

                                    printf('<td>%s ms</td>', $attempt['process_time']);
            
                                    echo('</tr>');
                                }
                            }
                        ?>
                    </table>
                </td>
            </tr>
    </table>
</body>

</html>