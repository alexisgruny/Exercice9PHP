<?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        <title>TP</title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <?php
            //Création d'un tableau des mois
            $months = [
                'Janvier',
                'Février',
                'Mars',
                'Avril',
                'Mai',
                'Juin',
                'Juillet',
                'Août',
                'Septembre',
                'Octobre',
                'Novembre',
                'Décembre'
            ];
            ?>
            <select name="month">
                <?php
                $indice = 1;
                foreach ($months as $month) {
                    ?>
                    <option 
                    <?php
                    if (empty($_POST['month'])) {
                        echo '';
                    } elseif ($_POST['month'] == $indice) {
                        // Selected permet de garder en mémoire l'année ou le mois séléctionné.
                        echo 'selected';
                    }
                    ?> value="<?php echo $indice++ ?>">
                        <?php echo $month; ?></option>
                    <?php
                }
                ?>
            </select>
            <select name="years">
                <?php
                // creation d'une plage d'année
                for ($year = 1900; $year <= 2100; $year++) {
                    ?>
                    <option <?php
                    // affichage de l'année actuelle
                    if (empty($_POST['years']) && ($year == date('Y'))) {
                        echo 'selected';
                        // affichage de l'année selectionnée.
                    } elseif (!empty($_POST['years']) && $_POST['years'] == $year) {
                        // stock en mémoire l'année selectionnée.
                        echo 'selected';
                    };
                    ?> value="<?php echo $year ?>"><?php echo $year; ?></option>
                        <?php
                    }
                    ?>
            </select>
            <input class="btn btn-primary" type="submit" value="Valider"/>
        </form>
        <?php
//condition mois et années  :
        if (isset($_POST['month']) && isset($_POST['years'])) {
            // cal_days_in_month nombre de jours dans un mois.
            // CAL_GREGORIAN ref. calendrier.
            $calendar = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['years']);
            // Tableau jours de la semaine.
            $daysOfWeek = [
                'LUNDI',
                'MARDI',
                'MERCREDI',
                'JEUDI',
                'VENDREDI',
                'SAMEDI',
                'DIMANCHE'
            ];
            //1er jours du mois.
            $firstDay = date('w', mktime(0, 0, 0, $_POST['month'], 1, $_POST['years']));
            //dernier jours du mois.
            $lastDay = date('w', mktime(0, 0, 0, $_POST['month'], $calendar, $_POST['years']));
            // récupérer les jours restant.
            $differenceInWeek = 7 - $lastDay;
            ?>
            <table>
                <?php
                //Afficher le mois et l'année
                if (isset($_POST['month']) && isset($_POST['years'])) {
                    ?>
                    <h1>
                        <?php
                        echo $months[$_POST['month'] - 1] . ' ' . $_POST['years'];
                        ?>
                    </h1>
                    <?php
                }
                ?>
                <tr>
                    <?php
                    foreach ($daysOfWeek as $inWeek) {
                        ?>
                        <th class="blue col-md-1">
                            <?php
                            //Afficher les jours de la semaine sur le calendrier
                            echo $inWeek;
                            ?>
                        </th>
                        <?php
                    }
                    ?>
                </tr>
                <?php
                // si 0 = dimanche et dimanche = 7
                if ($firstDay == 0) {
                    $firstDay = 7;
                }
                $days = 1;
                // Création du tableau.
                for ($i = 1; $i <= $calendar + ($firstDay - 1); $i++) {
                    if ($i % 7 == 1) {
                        ?>
                        <tr> 
                            <?php
                        }
                        if ($i >= $firstDay) {
                            ?>
                            <td><?php
                                //Incrémentation des jours
                                echo $days;
                                $days++;
                                ?>
                            </td>
                            <?php
                        } else {
                            ?>
                            <!-- les jours inéxistants du mois -->
                            <td class="black"></td>
                            <?php
                        }
                    }
                    // Calcul des derniers jours du mois
                    for ($a = 1; $a <= $differenceInWeek; $a++) {
                        if ($a < $calendar && $lastDay != 0) {
                            ?>
                            <td class="black"></td>
                            <?php
                        }
                    }
                }
                ?>
        </table>
    </body>
</html>
