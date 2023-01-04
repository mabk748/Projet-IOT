<?php
    
    session_start();

    // Redirecting to login page if client not logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

        header("Location: login.php");
        exit();

    }

    require("basicFunctions.php")

?>
<?php
$period = "week";
$prod = "";

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
function generate_line_graph($prod){
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
            labels : <?php echo get_label($period); ?>,
            datasets : [
            {
                fillColor : "rgba(172,194,132,0.4)",
                strokeColor : "#ACC26D",
                pointColor : "#fff",
                pointStrokeColor : "#9DB86D",
                data : <?php echo get_data($prod, $period); ?>
            }
        ]
        }';
    echo 'var conso = document.getElementById("conso").getContext("2d");
    new Chart(conso).Line(consoData);</script>';
    echo '</div>';
}

function generate_pie_graph($prod){
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
function generate_line_graph($prod){
    echo '<canvas id="conso" width="relative"></canvas>';
    echo '<script>
        var consoData = {
            labels :', echo get_label($period);,',
            datasets : [
            {
                fillColor : "rgba(172,194,132,0.4)",
                strokeColor : "#ACC26D",
                pointColor : "#fff",
                pointStrokeColor : "#9DB86D",
                data : [1, 2, 3, 4, 5, 6, 7]
            }
        ]
        }';
    echo 'var conso = document.getElementById("conso").getContext("2d");
    new Chart(conso).Line(consoData);</script>';
    echo '</div>';
}

function generate_pie_graph($prod){
    echo '<div> <label for="period">Select a period:</label>
    <select name="period" id="period">
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
*/
function ONOFF_switch($prod){
    echo '<h3><?php echo $prod ?> (ON/OFF)</h3>
    <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>';
}

function value_slider($prod){
    echo '<div class="slidecontainer">
    <input type="range" min=<?php  ?> max="100" value="50" class="slider" id="myRange">
  </div>';
}

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

<?php $room = $_GET['Piece'] ;?>
<?php echo "<h2>$room</h2>";?>
<div class="rowC">
  <div class="columnC" style="background-color: #fff;">
    <h2>Graphs</h2>
    <?php echo generate_line_graph($prod, $period); ?>
    <?php echo generate_pie_graph($prod, $period); ?>
  </div>
  <div class="columnC">
    <h2>Command </h2>
    <h3>ON/OFF</h3>
    <label class="switch">
        <input type="checkbox">
        <span class="sliderC round"></span>
      </label>
  </div>
</div>

</body>
</html>