<?php
require_once('../StockData.php');

const apiURL = 'https://api.iextrading.com/1.0/';

$stocks = new StockData(apiURL);

//print("<pre>" . print_r($stocks->getKeyData('aapl'), JSON_PRETTY_PRINT) . "</pre>");

if(isset($_GET['ticker'])) {
    $ticker = $_GET['ticker'];

    $keyData = $stocks->getKeyData($ticker);
    $chartData = $stocks->getChartData($ticker, '1m');
} else {
  $ticker = '';
}

?>
<!DOCTYPE html>
    <html lang="fi">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Basic Tags -->
            <meta name="description" content="">
            <link rel="icon" href="favicon.ico">
            <title>Demo</title>
            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        </head>
        <body>
            <header class=""></header>
    
            <main>
                <div class="container">
                    <h1 class="text-center mt-5">Search for stocks</h1>
         
                    <div class="container mt-5 pt-5 mx-auto d-flex justify-content-center align-items-center flex-row">
                        <form action="index.php" method="GET">
                            <input type="text" class="form-control pt-0" style="display: inline; width: auto" name="ticker" placeholder="Type in any stock ticker" required>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                <div class="row d-flex flex-column align-items-center mt-5">
                    <?php
                        if(isset($keyData)) {
                                echo "<div class='element'>
                                        <div class='card' style='width: 38rem;'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>{$keyData['companyName']}</h5>
                                                <h6 class='card-subtitle mb-2 text-muted'>{$keyData['symbol']}</h6>
                                                <p class='card-text'>Market Cap - ". '' ."$</p>
                                                <ul>
                                                    <li class='card-text'>This year's high - {$keyData['week52high']}</li>
                                                    <li class='card-text'>This year's low - {$keyData['week52low']}</li>
                                                </ul>
                                                <br>
                                                <div id='chart'></div>
                                            </div>
                                        </div>
                                      </div>";
                        }
                    ?>
                </div>
            </main>
    
            <footer class=""></footer>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                var options = {
                    chart: {
                        height: 350,
                        type: 'candlestick',
                    },
                    series: [{
                        data: [
                        <?php 
                            foreach($chartData as $data) {
                                echo "{ 
                                        x: new Date('{$data['label']}'), // outputs date in Mmm-dd format
                                        y: [{$data['open']},{$data['high']},{$data['low']},{$data['close']}] 
                                      },"; 
                            } 
                        ?>
                        ]
                    }],
                    title: {
                        text: '<?php echo $keyData['companyName']; ?>',
                        align: 'left'
                    },
                    xaxis: {
                        type: 'datetime'
                    },
                    yaxis: {
                        tooltip: {
                            enabled: true
                        }
                    }
                }
                
                var chart = new ApexCharts(
                    document.querySelector("#chart"),
                    options
                );

                chart.render();
            </script>
        </body>
    </html>