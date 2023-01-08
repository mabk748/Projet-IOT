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
$q_ProdsList = 'SELECT refProduit, idProduit FROM ProduitsEnService WHERE idproduit IN (' .$str_ProdsId .') ORDER BY refProduit';
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

print_r($ProdsList);

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

/*
function generate_graphs($prod){
    for ($i = 0, $size = count($ProdsFeaturesList); $i < $size; $i++){
        if ($ProdsFeaturesList[$i] == "line"){
            generate_line_graph($prod);
        }
        elseif ($ProdsFeaturesList[$i] == "pie") {
            generate_pie_graph($prod);
        }
    }
}
*/
function get_label($period){
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
function generate_line_graph($prod, $period){
    echo '<div> <label for="period">Select a period:</label>
    <select name="period" id="period">
      <option value="day">Today</option>
      <option value="week" selected>This week</option>
      <option value="month">This month</option>
      <option value="year">This year</option>
    </select>', '<?php $period = $_POST["period"]; ?>';
    echo '<canvas id="conso" width="relative"></canvas>';
    echo '<script>
        var consoData = {
            labels :'.get_label($period).',
            datasets : [
            {
                fillColor : "rgba(172,194,132,0.4)",
                strokeColor : "#ACC26D",
                pointColor : "#fff",
                pointStrokeColor : "#9DB86D",
                data : '. get_data($prod, $period) .'
            }
        ]
        }';
    echo 'var conso = document.getElementById("conso").getContext("2d");
    new Chart(conso).Line(consoData);</script>';
    echo '</div>';
}

function generate_pie_graph($x_values, $y_values, $title){
    echo "<h4>" .$title ."</h4>\n";
    echo '<div> <label for="period">Select a period:</label>
    <select name="period" id="period">
      <option value="day">Today</option>
      <option value="week">This week</option>
      <option value="month">This month</option>
      <option value="year">This year</option>
    </select>';
    echo '<canvas id="countries" width="relative"></canvas>';
    echo '<script>
    // pie chart data
    var pieData = [
        {
            value: 20,
            color:"#878BB6"
        },
        {
            value : 40,
            color : "#4ACAB4"
        },
        {
            value : 10,
            color : "#FF8153"
        },
        {
            value : 30,
            color : "#FFEA88"
        }
    ];
    // pie chart options
    var pieOptions = {
         segmentShowStroke : false,
         animateScale : true
    }
    // get pie chart canvas
    var countries= document.getElementById("countries").getContext("2d");
    // draw pie chart
    new Chart(countries).Pie(pieData, pieOptions);
    </script>';
    echo '</div>';
}
/*
function current_perc($prod){
    // prend la valeure actuelle et la transforme en % pour le controle des produits
}
*/
function ONOFF_switch($prod){
    echo '<h4>(ON/OFF)</h4>
    <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>';
}
/*
function value_slider($prod){
    echo '<div class="slidecontainer">
    <h4>Gestion de la valeur</h4>
    <input type="range" min=1 max="100" value='.current_perc($prod).' class="slider" id="myRange">
  </div>';
}
*/

function afficher_produit($produit, $period)    {

    afficher_graphs($produit, $period);
    //afficher_controls($produit);

}

function afficher_graphs($produit, $period){
    
    if(!empty($produit['mesures']))  {

        //$x_values = $produit['mesures'];

        foreach($produit['mesures'] as $measure => $values)   {

            generate_pie_graph($values['horodatage'], $values['valeur'], $measure);

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
