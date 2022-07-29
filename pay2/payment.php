<?php
    session_start();
    

    $_SESSION['TerminalBusID'] = $_POST['TerminalBusID'];
    $_SESSION['BusCode'] = $_POST['BusCode'];
    $_SESSION['Class'] = $_POST['Class'];
    $_SESSION['Type'] = $_POST['Type'];
    $_SESSION['BusName'] = $_POST['BusName'];
    $_SESSION['BusTerminalName'] = $_POST['BusTerminalName'];
    $_SESSION['NumberSeats'] = $_POST['NumberSeats'];
    $_SESSION['Capacity'] = $_POST['Capacity'];
    $_SESSION['Pricef'] = $_POST['Pricef'];
    $_SESSION['Source'] = $_POST['Source'];
    $_SESSION['SourceEn'] = $_POST['SourceEn'];
    $_SESSION['Destination'] = $_POST['Destination'];
    $_SESSION['DestinationEn'] = $_POST['DestinationEn'];
    $_SESSION['SourceCity'] = $_POST['SourceCity'];
    $_SESSION['SourceCityEn'] = $_POST['SourceCityEn'];
    $_SESSION['DestinationCity'] = $_POST['DestinationCity'];
    $_SESSION['DestinationCityEn'] = $_POST['DestinationCityEn'];
    $_SESSION['URL'] = $_POST['URL'];
    $_SESSION['DepartureTerminalCode'] = $_POST['DepartureTerminalCode'];
    $_SESSION['DepartureDate'] = $_POST['DepartureDate'];
    $_SESSION['DepartureTime'] = $_POST['DepartureTime'];
    $_SESSION['DepartureDateTimeFa'] = $_POST['DepartureDateTimeFa'];
    $_SESSION['ArrivalTerminalCode'] = $_POST['ArrivalTerminalCode'];
    $_SESSION['ArrivalDate'] = $_POST['ArrivalDate'];
    $_SESSION['ArrivalTime'] = $_POST['ArrivalTime'];
    $_SESSION['ArrivalDateTimeFa'] = $_POST['ArrivalDateTimeFa'];
    $_SESSION['NumberPeople'] = $_POST['NumberPeople'];
    $_SESSION['Chairs'] = $_POST['Chairs'];
    $_SESSION['Json'] = $_POST['Json'];
    
    
    /***********************************************************************************************************************/
    
    // require_once "nusoap/nusoap.php";
    ini_set("soap.wsdl_cache_enabled", "0");
    
    $PIN = '07YH1ul3621hdrbfU5M2';
    $wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Sale/SaleService.asmx?WSDL";
    $site_call_back_url = "http://bahar360.ir/confirm/";
    
    $amount = $_POST['Pricef'] ? $_POST['Pricef'] : "1000";
    // $order_id = $_POST['OrderId'] ? $_POST['OrderId'] : "500";
    $order_id = $now = time().mt_rand(1234,9876);
    
    
    $params = array(
    	"LoginAccount" => $PIN,
    	"Amount" => $amount,
    	"OrderId" => $order_id,
    	"CallBackUrl" => $site_call_back_url
    );
    
    $client = new SoapClient($wsdl_url);
    // print_r($client);
    // echo 'sa';
    try {
    	$result = $client->SalePaymentRequest(array(
    		"requestData" => $params
    	));
    	if ($result->SalePaymentRequestResult->Token && $result->SalePaymentRequestResult->Status === 0) {
    		header("Location: https://pec.shaparak.ir/NewIPG/?Token=".$result->SalePaymentRequestResult->Token); /* Redirect browser */
    		exit();
    	} elseif ($result->SalePaymentRequestResult->Status  != '0') {
    		$err_msg = "(<strong> کد خطا : " . $result->SalePaymentRequestResult->Status . "</strong>) " .
    			$result->SalePaymentRequestResult->Message;
    	}
    	
    } catch (Exception $ex) {
    	$err_msg =  $ex->getMessage();
    }

?>


<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	
	<title>پرداخت آنلاین</title>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jQuery v1.12.4.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
	<style type="text/css">
		.ltr {
			direction: ltr;
		}

		.rtl {
			direction: rtl;
		}
	</style>
</head>

<body class="rtl">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">پرداخت آنلاین</div>
			<div class="panel-body">
				<?php if ($err_msg) : ?>
					<div class="alert alert-danger alert-dismissible" role="alert"><?php echo $err_msg; ?></div>
				<?php else : ?>
					<div class="alert alert-danger alert-dismissible" role="alert">جوابی از طرف سرویس دهنده داده نشد</div>
				<?php endif; ?>
				<a class="btn btn-info" href="/">بازگشت به خانه</a>
			</div>
		</div>
	</div>
</body>

</html>





