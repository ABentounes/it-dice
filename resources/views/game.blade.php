<link rel="stylesheet" href="{{ asset('css/game.css') }}">
@include('layouts.base')
<style>
    * {
        color: white;
    }
</style>
<?php
$currentRoll = 0;
$nbPlayer = $_POST['nbPlayers'];
$nbAi = $_POST['nbAi'];;
$nbDices = $_POST['nbDices'];;
$nbRounds = $_POST['nbRounds'];;
$nbFaces = intval($_POST['nbFaces']);;
$plusOne = isset($_POST['plusOne']);
$minusOne = isset($_POST['minusOne']);

$roundWinner = [];
$winnerList = [];
$scores = [];
$count = [];


for ($i = 0; $i < $nbRounds; $i++) {
    for ($j = 0; $j < $nbPlayer + $nbAi; $j++) {
        $scores[$i][$j] = 0;
        for ($k = 0; $k < $nbDices; $k++) {
            $scores[$i][$j] += random_int(1, $nbFaces);
        }
    }
    if ($plusOne == 'on') {
        $nbDices++;
    }
    if ($minusOne == 'on' && $nbDices > 1) {
        $nbDices--;
    }
}


for ($i = 0; $i < $nbRounds; $i++) {
    $valueWinner = $scores[$i][0];
    $j = 0;
    $roundWinner = [];
    foreach ($scores[$i] as $valuePlayers => $valuePlayer) {
        if ($valuePlayer == $valueWinner) {
            array_push($roundWinner, $j);
        } elseif ($valuePlayer > $valueWinner) {
            $valueWinner = $valuePlayer;
            $roundWinner = [$j];
        }
        $j++;
    }

    array_push($winnerList, $roundWinner);
}



// $scores['manche']['joueur']

?>

<table id="scoreTable">
    <thead>
        <tr>
            <th>Manche: </th>
            <?php
            for ($i = 0; $i < $nbRounds; $i++) {
                echo ("<th>" . ($i + 1) . "</th>");
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php

        if ($nbPlayer > 0) {
            for ($i = 0; $i < $nbPlayer; $i++) {
                echo ("<tr><td>Joueur " . ($i + 1) . "</td>");
                if ($nbRounds > 1) {
                    for ($j = 0; $j < $nbRounds; $j++) {
                        echo ("<td>" . $scores[$j][$i] . "</td>");
                    }
                } else {
                    echo ("<td>" . $scores[0][$i] . "</td>");
                }
            }
        }
        if ($nbAi > 0) {
            for ($i = $nbPlayer; $i < $nbPlayer + $nbAi; $i++) {
                echo ("<tr><td>IA " . ($i + 1) . "</td>");
                if ($nbRounds > 1) {
                    for ($j = 0; $j < $nbRounds; $j++) {
                        echo ("<td>" . $scores[$j][$i] . "</td>");
                    }
                } else {
                    echo ("<td>" . $scores[0][$i] . "</td>");
                }
            }
        }
        echo ("</tr>")
        ?>
    </tbody>
</table>


<table id="podium">
    <thead>
        <th>Podium</th>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($winnerList as $rounds => $round) {
            foreach ($round as $players => $player) {
                if (!isset($count[$player])) {
                    $count[$player] = 0;
                }
                $count[$player] += 1;
            }
        }

        arsort($count);

        $compare = null;

        foreach ($count as $id => $score) {

            if ($i == 0) {
                if ($id < $nbPlayer) {
                    echo ("<tr><td>Joueur " . ($id + 1) . " est n°" . ($i + 1) . "</td></tr>");
                } else {
                    echo ("<tr><td>IA " . ($id + 1) . " est n°" . ($i + 1) . "</td></tr>");
                }
                $i++;
            } else {
                if ($compare == $score) {
                    if ($id < $nbPlayer) {
                        echo ("<tr><td>Joueur " . ($id + 1) . " est n°" . ($i) . "</td></tr>");
                    } else {
                        echo ("<tr><td>IA " . ($id + 1) . " est n°" . ($i) . "</td></tr>");
                    }
                } else {
                    if ($id < $nbPlayer) {
                        echo ("<tr><td>Joueur " . ($id + 1) . " est n°" . ($i + 1) . "</td></tr>");
                    } else {
                        echo ("<tr><td>IA " . ($id + 1) . " est n°" . ($i + 1) . "</td></tr>");
                    }
                    $i++;
                }
            }
            $compare = $score;
        }
        ?>
    </tbody>
</table>

@extends('layouts.footer')