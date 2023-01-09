<?php

    session_start();

    require("basicFunctions.php");   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOMEotix</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
</head>
<body>

<?php require("header.php"); ?>

    <div class="relative">
        <div id = "middle">
            <div class="slider">
      <h2> Controler sa maison n'est plus qu'à un clic </h2>
                <div class="slider-viewport">
                  <div id="img1">
                    <div id="img2">
                      <div id="img3">
                        <div id="img4">
                          <div id="img5">
                            <div class="slider-content">
                              <img src="home1.jpg">
                              <img src="home2.jpg">
                              <img src="home3.png">
                              <img src="home4.jpg">
                              <img src="home5.jpg">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="slider-nav">
                  <a href="#img1"></a>
                  <a href="#img2"></a>
                  <a href="#img3"></a>
                  <a href="#img4"></a>
                  <a href="#img5"></a>
                </div>
              </div>
        </div>
    </div>
    
    <?php   require("footer.html"); ?>

</body>
</html>