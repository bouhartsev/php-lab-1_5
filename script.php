<?php
    $type = 'table';
    $num = 'all';

    if (isset($_GET['type'])) $type = $_GET['type'];
    if (isset($_GET['num'])) $num = $_GET['num'];

    function toLink($n) {
        global $type;
        if ($n>=2 and $n<=9) return '<a href="?num='.$n.'" class="num_a">'.$n.'</a>';
        else return $n;
    }

    function makeTable($n) {
        echo '<table>';
        for ($i=2;$i<10;$i++) {
            echo '<tr>';
            echo '<td>'.toLink($n).'*'.toLink($i).'</td><td>'.toLink($i*$n).'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    function makeDiv($n) {
        echo '<div>';
        for ($i=2;$i<10;$i++) {
            echo toLink($n).'*'.toLink($i).' = '.toLink($i*$n).'<br>';
        }
        echo '</div>';
    }

    function makeCont($n) {
        global $type;

        if ($type=='table') makeTable($n);
        else makeDiv($n);
    }
?>