<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>exercice7</title>
</head>
<body>
   <p>
   <?php
   $days = strtotime("+20 days");
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    echo strftime("%A %e %B %Y",$days);
   ?>
       </p>

</body>
</html>
