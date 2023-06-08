<?php

$positions[] = 'Forward';
$positions[] = 'Defender';
$positions[] = 'Goalkeeper';
$positions[] = 'Midfielder';

if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $suggestion = "";

    if ($query !== "") {
        $query = strtolower($query);
        $length = strlen($query);

        foreach ($positions as $position) {
            if (stristr($query, substr($position, 0, $length))) {
                if ($suggestion == "") {
                    $suggestion = $position;
                } else {
                    $suggestion .= ", $position";
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
