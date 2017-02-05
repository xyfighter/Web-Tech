<?php
	header("Access-Control-Allow-Origin: *");

	
	if (isset($_GET["q"])) {
		$res = file_get_contents("http://dev.markitondemand.com/Api/v2/Lookup/json?input=". $_GET["q"]);
		echo $res;
	}

	if (isset($_GET["symbol"])) {
		$res = file_get_contents("http://dev.markitondemand.com/Api/v2/Quote/json?symbol=" . $_GET['symbol']);
		echo $res;
	}
	if (isset($_GET['chart'])) {
    	$res = file_get_contents('http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters={"Normalized":false,"NumberOfDays":1095,"DataPeriod":"Day","Elements":[{"Symbol":"'.$_GET['chart'].'","Type":"price","Params":["ohlc"]}]}');
    
    	echo $res;
    }
    if (isset($_GET['news'])) {

    	$accountKey = 'QpEWMaevi2/Vph8aVwihfBC8d/qGFXAZsk9AUkp3OHc';
    	$WebSearchURL =  "https://api.datamarket.azure.com/Bing/Search/v1/News?$format=json&Query="           

    	$context = stream_context_create(array(
            'http' => array(
                'request_fulluri' => true,
                    'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
                        )
               ));

    	$request = $WebSearchURL . urlencode( '\'' . $_GET["news"] . '\'');

		$res = file_get_contents($request, 0, $context);  
    	echo $res;
    }

?>