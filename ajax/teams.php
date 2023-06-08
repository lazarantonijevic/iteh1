<?php

$teams[] = 'Arsenal';
$teams[] = 'Manchester City';
$teams[] = 'Newcastle';
$teams[] = 'Tottenham';
$teams[] = 'Manchester United';
$teams[] = 'Liverpool';
$teams[] = 'Brighton';
$teams[] = 'Chelsea';
$teams[] = 'Fulham';
$teams[] = 'Brentford';
$teams[] = 'Crystal Palace';
$teams[] = 'Aston Villa';
$teams[] = 'Leicester City';
$teams[] = 'Bournemouth';
$teams[] = 'Leeds United';
$teams[] = 'West Ham';
$teams[] = 'Everton';
$teams[] = 'Nottingham Forest';
$teams[] = 'Southampton';
$teams[] = 'Wolverhampton';


if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $suggestion = "";

    if ($query !== "") {
        $query = strtolower($query);
        $length = strlen($query);

        foreach ($teams as $team) {
            if (stristr($query, substr($team, 0, $length))) {
                if ($suggestion == "") {
                    $suggestion = $team;
                } else {
                    $suggestion .= ", $team";
                }
            }
        }
    }
    if ($suggestion == "") {
        echo 'No suggestions';
    } else {
        echo $suggestion;
    }
}
