<?php    
    session_start();
    // Redirecting to login page if client not logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

        header("Location: login.php");
        exit();
    }
    require("basicFunctions.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
    <title>HOMEotix</title>
        <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
</head>
<body>
<?php   require("header.php"); ?>

<?php 

$room = $_GET['Piece'] ;
echo "<h2>$room</h2>\n";

// Connecting to database
$dbh = dataBaseConnect();

$q_SemiProdsList = 'SELECT idProduit, mesures FROM Produits WHERE piece="'.$room .'"';
$stmt = $dbh->query($q_SemiProdsList);
$SemiProdsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

$str_ProdsId = implode(',', array_column($SemiProdsList, 'idProduit'));
$q_ProdsList = 'SELECT refProduit, idProduit FROM ProduitsEnService WHERE idProduit IN (' .$str_ProdsId .') AND refClient=' .$_SESSION['clientId'] .' ORDER BY refProduit';
$stmt = $dbh->query($q_ProdsList);
$ProdsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($ProdsList as &$produit) {

    $produit['periode'] = "Today";
    $produit['mesures'] = array();

    // Physiscal variables measured by the product
    $measures = '';
    // Loop through product types (table Produits)
    foreach($SemiProdsList as $prodType)    {
        // If current product is of current product type
        if ($prodType['idProduit'] == $produit['idProduit'])    {
            // Split the measures string into an array
            $measures = explode(', ', $prodType['mesures']);
            break;
        }
    }

    // Loop through the different measures
    foreach($measures as $measure)    {

        // Switch that queries all measurements for ($measure && $produit) in the right table
        switch($measure)    {

            case 'temperature':
                $q_measurements = 'SELECT horodatage, temperature FROM MesuresTemperature WHERE refProduit="'.$produit['refProduit'] .'"';
                break;

            case 'humidite':
                $q_measurements = 'SELECT horodatage, humidite FROM MesuresTemperature WHERE refProduit="'.$produit['refProduit'] .'"';
                break;
            
            case 'detection':
                $q_measurements = 'SELECT horodatage, detection FROM Detection WHERE refProduit="'.$produit['refProduit'] .'"';
                break;
         
            case 'air':
                $q_measurements = 'SELECT horodatage, air FROM MesuresAir WHERE refProduit="'.$produit['refProduit'] .'"';
                break;
               
        }
        // Execute query
        $stmt = $dbh->query($q_measurements);
        // Measurements are values of a measure
        $measurements = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($measurements)

        // Declare necessary arrays to store measurments
        $produit['mesures'][$measure] = array();
        $produit['mesures'][$measure]['horodatage'] = array();
        $produit['mesures'][$measure]['valeur'] = array();

        // Loop through measurements
        // ex: measurement = Array('horodatage' => 2023-01-04 16:15:09, 
        //                         'temperature' => 15)
        foreach($measurements as $measurement)   {
                                                    
                array_push($produit['mesures'][$measure]['horodatage'], $measurement['horodatage']);
                array_push($produit['mesures'][$measure]['valeur'], $measurement[$measure]);

        }
    }
    //print_r($produit['mesures']);
}

//print_r($ProdsList);

?>

<div class="rowC">
    <div class="columnC" style="background-color: #fff;">
    <?php 

        foreach ($ProdsList as $prod)  {
            
            echo '<h2>-- Produit n°' .$prod["refProduit"] .' --</h2>';
            afficher_produit($produit, 0);

        }

    ?>
    </div>
</div>

</body>
</html>

<?php

function get_Label($period){
    if ($period == "year"){
        $Labels =array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    }
    elseif ($period == "week") {
        $Labels = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    }
    elseif ($period == "month") {
        $Labels = array();
        for ($i = 1, $day = date("d"); $i <= $day; $i++){
            array_push($Labels, $i);
        }
    }
    return $Labels;
}

/*function get_meas($donnes, $period){
    $label = get_Label($period);
    $j = count($label);
    $datetime = new DateTime($donnes['horodatage'][0]); 
    print_r($datetime['d']);
    if($period == "week"){
    //    while($j>0){
            $data = array();
            $date = $donnes['horodatage'][0]["d"];
            for($i=0; $i<count($donnes['horodatage']); $i++){
                $sub = array();
                if($donnes['horodatage'][$i]["d"] == $date){
                    array_push($sub, $donnes['valeur'][$i]);
                }
                else{
                    $date = $donnes['horodatage'][$i]["d"];
                    $moy = array_sum($sub)/count($sub);
                    array_push($data, $moy);
                    unset($sub);
                    $sub = array();
                    array_push($sub, $donnes['valeur'][$i]);
                    $j = $j-1;
                }
            }
    //    }
    }
    elseif($period == "year"){
        while(j>0){
            $data = array();
            $date = $donnes['horodatage'][$i]["m"];
            for($i=0; $i<count($donnes['horodatage']); $i++){
                $sub = array();
                if($donnes['horodatage'][$i]["m"] == $date){
                    array_push($sub, $donnes['valeur'][$i]);
                }
                else{
                    $date = $donnes['horodatage'][$i]["m"];
                    $moy = array_sum($sub)/count($sub);
                    array_push($data, $moy);
                    unset($sub);
                    $sub = array();
                    array_push($sub, $donnes['valeur'][$i]);
                    $j = $j-1;
                }
            }
        }
    }
    elseif($period == "month"){
        while(j>0){
            $data = array();
            $date = $donnes['horodatage'][0]["d"];
            for($i=0; $i<count($donnes['horodatage']); $i++){
                $sub = array();
                if($donnes['horodatage'][$i]["d"] == $date){
                    array_push($sub, $donnes['valeur'][$i]);
                }
                else{
                    $date = $donnes['horodatage'][$i]["d"];
                    $moy = array_sum($sub)/count($sub);
                    array_push($data, $moy);
                    unset($sub);
                    $sub = array();
                    array_push($sub, $donnes['valeur'][$i]);
                    $j = $j-1;
                }
            }
        }
    }
    return $data;
}
*/

function get_meas($donnes, $period){
    $label = get_Label($period);
    $j = count($label);
    if($period == "week"){
        while($j>0){
            $data = array();
            $ndate = date("d/m/Y", strtotime($donnes['horodatage'][0][0]));
            echo $ndate;
            $date =$ndate["d"];
            for($i=0; $i<count($donnes['horodatage']); $i++){
                $sub = array();
                $ndate = date("d/m/Y", strtotime($donnes['horodatage'][$i][0]));
                if($ndate["d"] == $date){
                    array_push($sub, $donnes['valeur'][$i]);
                }
                else{
                    $ndate = date("d/m/Y", strtotime($donnes['horodatage'][$i][0]));
                    $date = $ndate["d"];
                    $moy = array_sum($sub)/count($sub);
                    array_push($data, $moy);
                    unset($sub);
                    $sub = array();
                    array_push($sub, $donnes['valeur'][$i]);
                    $j = $j-1;
                }
            }
        }
    }
    elseif($period == "year"){
        while($j>0){
            $data = array();
            $ndate = date("d/m/Y", strtotime($donnes['horodatage'][0][0]));
            $date = $ndate["m"];
            for($i=0; $i<count($donnes['horodatage']); $i++){
                $sub = array();
                $ndate = date("d/m/Y", strtotime($donnes['horodatage'][$i][0]));
                if($ndate["m"] == $date){
                    array_push($sub, $donnes['valeur'][$i]);
                }
                else{
                    $ndate = date("d/m/Y", strtotime($donnes['horodatage'][$i][0]));
                    $date = $ndate["m"];
                    $moy = array_sum($sub)/count($sub);
                    array_push($data, $moy);
                    unset($sub);
                    $sub = array();
                    array_push($sub, $donnes['valeur'][$i]);
                    $j = $j-1;
                }
            }
        }
    }
    elseif($period == "month"){
        while($j>0){
            $data = array();
            $ndate = date("d/m/Y", strtotime($donnes['horodatage'][0][0]));
            $date = $ndate["d"];
            for($i=0; $i<count($donnes['horodatage']); $i++){
                $sub = array();
                $ndate = date("d/m/Y", strtotime($donnes['horodatage'][$i][0]));
                if($ndate["d"] == $date){
                    array_push($sub, $donnes['valeur'][$i]);
                }
                else{
                    $ndate = date("d/m/Y", strtotime($donnes['horodatage'][$i][0]));
                    $date = $ndate["d"];
                    $moy = array_sum($sub)/count($sub);
                    array_push($data, $moy);
                    unset($sub);
                    $sub = array();
                    array_push($sub, $donnes['valeur'][$i]);
                    $j = $j-1;
                }
            }
        }
    }
    return $data;
}

function generate_line_graph($prod, $period, $meas){
    $data = array();
    for ($i=0; $i<count($period); $i++){
        array_push($data, array($period[$i], $meas[$i]));
    }
    $max_value = 0;
    foreach ($data as $point) {
        if ($point[1] > $max_value) {
            $max_value = $point[1];
        }
    }
    echo'<canvas id="chart_'.$prod.'" width="600" height="400"></canvas>
    <script>
        var canvas = document.getElementById("chart_'.$prod.'");
        var ctx = canvas.getContext("2d");
    
        var width = canvas.width;
        var height = canvas.height;
    
        var x_scale = width /' .count($data). ';
    
        var y_scale = height / ' .$max_value. ';
    
        ctx.beginPath();
        ctx.moveTo(0, height - (' .$data[0][1]. ' * y_scale));
        for (var i = 0; i < ' .count($data). '; i++) {
            ctx.lineTo(i * x_scale, height - (' .$data[$i][1]. ' * y_scale));
        }
        ctx.stroke();
    </script>';
}

function ONOFF_switch($prod){
    echo '<h4>(ON/OFF)</h4>
    <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>';
}

function afficher_produit($produit, $period)    {

    afficher_graphs($produit, $period);
    //afficher_controls($produit);

}

function afficher_graphs($produit, $period){
    
    if(!empty($produit['mesures']))  {

        //$x_values = $produit['mesures'];

        foreach($produit['mesures'] as $measure => $values)   {

            //$meas = get_meas($values, 'week');
            //generate_line_graph($meaure, $meas, 'week');

        }
    }
    else
        echo "Aucun graphique à afficher pour l'instant.";
}

function afficher_controls($produit){
    
    ONOFF_switch($produit);
    //value_slider($produit);

}

?>
