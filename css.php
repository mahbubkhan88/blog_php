<?php
    $themeChange = $obj->themeChange();
        while($result = mysqli_fetch_array($themeChange)){
        if($result['theme'] == 'default') { ?>
        <link rel="stylesheet" href="theme/default.css">
        <?php } elseif(($result['theme'] == 'green')){ ?>
         <link rel="stylesheet" href="theme/green.css">
        <?php } elseif(($result['theme'] == 'blue')){ ?>
        <link rel="stylesheet" href="theme/blue.css"> ?>
 <?php } } ?>