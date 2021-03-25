<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon-16x16.png" type="image/png">
    <title>Лабораторная работа 5. Динамическое формирование контента и меню. Таблица умножения</title>

    <?php
        include 'script.php';
    ?>
</head>
<body>
    <header>
        <img src="./img/Mospolytech_logo.jpg" alt="Mospolytech">
        <?php 
            $table_class='';
            $div_class='';
            if ($type=='table') $table_class=' menu_active';
            else $div_class=' menu_active';
        ?>
        <a href="?<?= 'num='.$num ?>&type=table" class ="menu_item <?= $table_class ?>">Табличная верстка</a>
        <a href="?<?= 'num='.$num ?>&type=div" class = "menu_item <?= $div_class ?>">Блочная верстка</a>
    </header>
    <main>
        <!-- левая часть страницы -->

        <div class="div_column">

            <a href="?num=all&<?= 'type='.$type ?>"class="main-menu a <?php if ($num=='all') echo 'selected'; ?>">Вся таблица умножения</a>
                <?php
                    for ($i=2; $i<10;$i++){
                        $num_class='';
                        if ($num==$i) $num_class='selected';
                        echo '<a href="?num='.$i.'&type='.$type.'" class="main-menu a '.$num_class.'">Таблица умножения на '.$i.'</a>';
                    }
                ?>
        </div>
        <!-- основная часть страницы -->
        <div class= "div_result">
            <?php 
                if ($num=='all') {
                    for ($i=2; $i < 10; $i++){
                        makeCont($i);
                    }
                }
                else {
                    makeCont($num);
                }
            ?>
        </div>  
    </main>
    <footer>
        <p><?php
            if (!isset($_GET['type'])) echo 'Верстка не выбрана.&nbsp';
            else if ($_GET['type']=='table') echo 'Выбрана табличная верстка.&nbsp';
            else if ($_GET['type']=='div') echo 'Выбрана блочная верстка.&nbsp';
            if ($num=='all') echo 'Вся таблица умножения.&nbsp'; 
            else echo 'Таблица умножения на '.$num.'.&nbsp'; 
            date_default_timezone_set("Europe/Moscow");
            echo date('Дата: d.m.y Время: H:i').'&nbsp';
            echo 'Матвей Бухарцев, 201-321'?>
        </p>
    </footer>
</body>
</html>