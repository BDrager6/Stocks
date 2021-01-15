<!DOCTYPE html>
<html>

<head>
    <script src="stocks.js"></script>
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <link rel="stylesheet" type="text/css" href="stocks.css">
</head>

<body>
	<p id='test'></p>
	<div id="addtick">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input type="text" id="input" name="awli">
		</form>
		<button onclick="addtick()">Submit</button>
	</div>
	<?php
		// Watch List Items (wli)
		$wli = array('NASDAQ:TSLA','NASDAQ:AAPL');
		// On Watch List (owl)
		$owl = "'" . $wli[0] . "', '" . $wli[1] . "'";
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			// Add Watch List Item (awli)
			$awli = $_POST['awli'];
			if (empty($awli)) {
				echo "Nothing To Add To The Watchlist";
			} else {
				$wli[] = $awli;
				$owl = "'" . $wli[0] . "', '" . $wli[1] . "', '" . $wli[2] . "'";
			}
		}
	?>
	<script type="text/javascript">
		document.getElementById('test').innerHTML = "<?php echo $owl; ?>";
	</script>
    <!-- TradingView Widget BEGIN -->
    <div class="tracker">
        <div class="tradingview-widget-container">
            <div id="tradingview_3e3d6"></div>
            <div id='trackwin'class="tradingview-widget-copyright"><a href= "https://www.tradingview.com/symbols/AMEX-VFH/" rel="noopener" target="_blank"></a></div>
            <script type="text/javascript">
                var watch = [<?php echo $owl?>];
                
                new TradingView.widget({
                    "width": 980,
                    "height": 610,
                    "symbol": "AMEX:VFH",
                    "interval": "D",
                    "timezone": "US/Mountain",
                    "theme": "dark",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "withdateranges": true,
                    "allow_symbol_change": true,
                    "watchlist": watch,
                    "container_id": "tradingview_3e3d6"
                });

            </script>
        </div>
    </div>
    <!-- TradingView Widget END -->
</body>
</html>
