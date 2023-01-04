<?php
$period = "week";
$prod = "";

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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
    <title>Cockpit</title>
    <style>
        body {
            top: 100px;
        }
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }
        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }
        input:checked + .slider {
        background-color: #2196F3;
        }
        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }
        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }
        .slider.round {
        border-radius: 34px;
        }
        .slider.round:before {
        border-radius: 50%;
        }
        * {
        box-sizing: border-box;
        }
        .column {
        top: 150px;
        float: left;
        width: 50%;
        padding: 10px;
        height: 100%; 
        }
        .row:after {
        content: "";
        display: table;
        clear: both;
        }
    </style>
</head>
<body>


<h2>Cockpit</h2>

<div class="row">
  <div class="column" style="background-color: #fff;">
    <h2>Graphs</h2>
    <?php echo generate_line_graph($prod, $period); ?>
    <?php echo generate_pie_graph($prod, $period); ?>
  </div>
  <div class="column" style="background-color: #6BF45C;">
    <h2>Command </h2>
    <h3>ON/OFF</h3>
    <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>
  </div>
</div>

<script>
    // line chart data
    var buyerData = {
        labels : ["January","February","March","April","May","June"],
        datasets : [
        {
            fillColor : "rgba(172,194,132,0.4)",
            strokeColor : "#ACC26D",
            pointColor : "#fff",
            pointStrokeColor : "#9DB86D",
            data : [203,156,99,251,305,247]
        }
    ]
    }
    // get line chart canvas
    var buyers = document.getElementById('buyers').getContext('2d');
    // draw line chart
    new Chart(buyers).Line(buyerData);
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
    // bar chart data
    var barData = {
        labels : ["January","February","March","April","May","June"],
        datasets : [
            {
                fillColor : "#48A497",
                strokeColor : "#48A4D1",
                data : [456,479,324,569,702,600]
            },
            {
                fillColor : "rgba(73,188,170,0.4)",
                strokeColor : "rgba(72,174,209,0.4)",
                data : [364,504,605,400,345,320]
            }
        ]
    }
    // get bar chart canvas
    var income = document.getElementById("income").getContext("2d");
    // draw bar chart
    new Chart(income).Bar(barData);
</script>
</body>
</html>