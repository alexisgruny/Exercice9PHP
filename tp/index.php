<?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra'); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>php part 9 tp</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <link rel="stylesheet" href="../css/master.css">
    </head>
    <body>
        <header>Calendrier php</header>
        <p>Année</p>
    <select>
    <?php $annee = 1900;
    while($annee != 2100){
        $annee++;
        echo '<option>'. $annee. '</option>';
    };
    ?>
        <p>Mois</p>
        </select>
        <select>
    <?php 
    $mois = array(
        'janvier',
        'fevrier',
        'mars',
        'avril',
        'mai',
        'juin',
        'juillet',
        'aout',
        'septembre',
        'octobre',
        'novembre',
        'decembre',
        );
    for($i = 0 ; $i<=11 ; $i++){
        echo '<option>'. $mois[$i]. '</option>';
    };
    ?>
        </select>
        <table>
            <thead>
            <?php
            $day = array(
        1 => 'Lundi ',
        2 => 'Mardi ',
        3 => 'Mercredi ',
        4 => 'Jeudi ',
        5 => 'Vendredi ',
        6 => 'Samedi ',
        7 => 'Dimanche ',
        );
            for($a = 1 ; $a <= 7 ; $a++){
                echo $day[$a];
            }
            ?>
            </thead>
            <?php 
            //if ($jours <= $joursMaxMois){
            //}
            ?>
        </table>
    </body>
</html>
