<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>exercice5</title>
</head>
<body>
  <p>
    <?php
    $now = new DateTime(date("Y-m-d"));
    $date = new DateTime('2016-05-16');
    $interval = $date->diff($now);
    echo $interval->format('%a jours écoulés depuis le 16 mai 2016');
    ?>
  </p>
</body>
</html>
