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
    	$res = file_get_contents("https://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=".$_GET['news']."&userip=cs-server.usc.edu");
    
    	echo $res;
    }

?>