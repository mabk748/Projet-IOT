<?php

    session_start();

    require("basicFunctions.php");   

?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="site.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV de Gaye Diawara</title>
</head>
<body>
    <?php   
        require("header.php"); 

        $cv_path = "CV/CV_" .$_GET['name'] .".jpg";

    ?>
    
    <div class="relative">
        <img id="middle" src=<?php echo $cv_path; ?> width="100%" >
        
    </div>
    
    <?php   require("footer.html"); ?>
    
</body>
</html>