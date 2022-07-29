<?php

    // session_start();
    // echo $_SESSION["flight_number"];
    // echo 'ss';
    
    session_start();
    
    // // $check_token = $_POST['inputtoken'];
    
    // /*************
    //     LOGIN GET
    //  **************/
    // $curl = curl_init();
    // curl_setopt_array($curl, [
    //     CURLOPT_RETURNTRANSFER => 1,
    //     CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/token?username=09153450308&password=123456',
    
    // ]);
    // $resp = curl_exec($curl);
    // if (!curl_exec($curl)) {
    //     echo 'خطای سرور برای دریافت توکن. ';
    //     echo 'مجدد تکرار نمائید';
    //     die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
    //     // return;
    // }
    // curl_close($curl);
    // $resp_decode = json_decode($resp);
    // // echo $resp;
    // // echo $resp_decode->token;
    // // echo $resp_decode->status;
    // $_SESSION['token'] = $resp_decode->token;
    // // echo $_SESSION['token'];
    
//     if ($check_token != $resp_decode->token) {
//         echo 'اعتبار تمام شده است';
//         echo '<br/>';
//         echo 'مجدد تکرار نمائید';
        
// 		header("Location: http://www.bahar360.ir"); /* Redirect browser */
// 		exit();
//         die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
//         // return;
//     }
    
    
    
    
    $_SESSION['FlightID'] = $_POST['FlightID'];
    $_SESSION['FlightType'] = $_POST['FlightType'];
    $_SESSION['AirlineName'] = $_POST['AirlineName'];
    $_SESSION['AirlineCode'] = $_POST['AirlineCode'];
    $_SESSION['AirlineLogo'] = $_POST['AirlineLogo'];
    $_SESSION['DepartureParentRegionName'] = $_POST['DepartureParentRegionName'];
    $_SESSION['DepartureDate'] = $_POST['DepartureDate'];
    $_SESSION['DepartureTime'] = $_POST['DepartureTime'];
    $_SESSION['PersianDepartureDate'] = $_POST['PersianDepartureDate'];
    $_SESSION['ArrivalParentRegionName'] = $_POST['ArrivalParentRegionName'];
    $_SESSION['ArrivalTime'] = $_POST['ArrivalTime'];
    $_SESSION['FlightNo'] = $_POST['FlightNo'];
    $_SESSION['Capacity'] = $_POST['Capacity'];
    $_SESSION['CabinType'] = $_POST['CabinType'];
    $_SESSION['FinalPrice'] = $_POST['FinalPrice'];
    $_SESSION['contact_number'] = $_POST['contact_number']; 
    $_SESSION['email_user'] = $_POST['email_user'];
    $_SESSION['Source'] = $_POST['Source'];
    $_SESSION['Destination'] = $_POST['Destination'];
    $_SESSION['json'] = $_POST['json'];
    // $_SESSION['json'] = str_replace("\\","",$_POST['json']); //$_POST['json'];
    
    
    
    /**************************************************************************************************************************/
    
    // echo $_POST['FlightID'];
    // echo '<br/>';
    // echo $_POST['FlightType'];
    // echo '<br/>';
    // echo $_POST['AirlineName'];
    // echo '<br/>';
    // echo $_POST['AirlineCode'];
    // echo '<br/>';
    // echo $_POST['AirlineLogo'];
    // echo '<br/>';
    // echo $_POST['DepartureParentRegionName'];
    // echo '<br/>';
    // echo $_POST['DepartureDate'];
    // echo '<br/>';
    // echo $_POST['DepartureTime'];
    // echo '<br/>';
    // echo $_POST['PersianDepartureDate'];
    // echo '<br/>';
    // echo $_POST['ArrivalParentRegionName'];
    // echo '<br/>';
    // echo $_POST['ArrivalTime'];
    // echo '<br/>';
    // echo $_POST['FlightNo'];
    // echo '<br/>';
    // echo $_POST['Capacity'];
    // echo '<br/>';
    // echo $_POST['CabinType'];
    // echo '<br/>';
    // echo $_POST['FinalPrice'];
    // echo '<br/>';
    // echo $_POST['contact_number'];
    // echo '<br/>';
    // echo $_POST['email_user'];
    // echo '<br/>';
    // echo $_POST['json'];
    
    
    // $p_array = array();
    // foreach ($_POST as $i => $value) {
    //     // array_push($p_array,$value); 
    //     echo "POST_[$i] is $value<br />";
    // }
    // print_r($p_array);
    
    
    //         /*****************
    //             RESERVE POST
    //      ******************/
    //     $curl2 = curl_init();
    //     // Sample
        
    //     // $params_array = $json;
    //     // $FlightNo = $_POST['flight_number'];
    //     // $source = $_POST['source'];
    //     // $destination = $_POST['destination'];
    //     // $AirlineCode = $_POST['airline'];
    //     // $CabinType = $_POST['classs'];
    //     // $FlightType = $_POST['type'];
    //     // $PersianDepartureDate = $_POST['departure_date_fa'];
    //     // $DepartureDate = $_POST['departure_date_en'];
    //     // $DepartureTime = $_POST['departure_time_en'];
    //     // $FinalPrice = $_POST['price'];
        
    //     $FlightID = $_SESSION['FlightID'];
    //     $FlightType = $_SESSION['FlightType'];
    //     $AirlineName = $_SESSION['AirlineName'];
    //     $AirlineCode = $_SESSION['AirlineCode'];
    //     $AirlineLogo = $_SESSION['AirlineLogo'];
    //     $DepartureParentRegionName = $_SESSION['DepartureParentRegionName'];
    //     $DepartureDate = $_SESSION['DepartureDate'];
    //     $DepartureTime = $_SESSION['DepartureTime'];
    //     $PersianDepartureDate = $_SESSION['PersianDepartureDate'];
    //     $ArrivalParentRegionName = $_SESSION['ArrivalParentRegionName'];
    //     $ArrivalTime = $_SESSION['ArrivalTime'];
    //     $FlightNo = $_SESSION['FlightNo'];
    //     $Capacity = $_SESSION['Capacity'];
    //     $CabinType = $_SESSION['CabinType'];
    //     $FinalPrice = $_SESSION['FinalPrice'];
    //     $contact_number = $_SESSION['contact_number'];  
    //     $email_user = $_SESSION['email_user'];
    //     $Source = $_SESSION['Source'];
    //     $Destination = $_SESSION['Destination'];
    //     $json = $_SESSION['json'];
    //     // $json = str_replace("\\","",$json);
    //     // echo json_decode($json);
        
        
    //     $rand = rand(10000000,90000000);
        
    //     $params_array = array(
    //         'api_token' => $resp_decode->token,
    //         'flight' => array(
    //             'avid_ref_code' => 'safarbooking_'.$FlightID,
    //             'flight_number' => $FlightNo,
    //             'source' => $Source,
    //             'destination' => $Destination,
    //             'airline' => $AirlineCode,
    //             'class' => $CabinType,
    //             'type' => $FlightType,
    //             'arrival_date_fa' => '0101-01-01',
    //             'arrival_time_fa' => '01:01',
    //             'arrival_date_en' => '0101-01-01',
    //             'arrival_time_en' => '01:01',
    //             'departure_date_fa' => $PersianDepartureDate,
    //             'departure_time_fa' => '01:01',
    //             'departure_date_en' => $DepartureDate,
    //             'departure_time_en' => $DepartureTime
    //         ),
    //         'payment' => array(
    //             'price' => $FinalPrice,
    //             'status' => 'sucess',
    //             'dargah' => 'parsian',
    //             'bank_token' => '$Token'
    //         ),
    //         'passengers' => json_decode($json)
            
    //         // 'passengers' => array(
    //         //     array(
    //         //       'name' => 'ali',
    //         //       'age' => '30'
    //         //     ),
    //         //     array(
    //         //       'name' => 'حسین',
    //         //       'age' => '10'
    //         //     )
    //         //   ),
    //     );
        
    //     // for ($i = 0; $i < 5; $i++) {
    //     // 	$params_array['passengers'][$i]['name'] = 'name' . $i;
    //     // 	$params_array['passengers'][$i]['age'] = 'age' . $i;
        
    //     // foreach ($_POST as $i => $value) {
    //     // for ($i = 0; $i < 5; $i++) {
    //     // 	$params_array['passengers'][$i]['name'] = '11111name' . $value;
    //     // 	$params_array['passengers'][$i]['contact_number'] = '1111111age' . $value;
    //     // }
        
    //     $params = http_build_query($params_array);
    //     // $params = $params_array;
    //     curl_setopt_array($curl2, [
    //         CURLOPT_RETURNTRANSFER => 1,
    //         CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/flight/reserve',
    //         CURLOPT_POST => 1,
    //         CURLOPT_POSTFIELDS => $params
    //     ]);
    //     $resp2 = curl_exec($curl2);
    //     curl_close($curl2);
    //     // json_encode($resp2, JSON_UNESCAPED_UNICODE);
    //     $resp2_decode = json_decode($resp2);
    //     echo $resp2;
    //     echo $resp2_decode->data->api_token;
    //     // echo $resp2_decode->data->passengers[0]->name;
    //     echo $resp2_decode->data->passengers;
        
    //     // echo $resp2_decode;
    //     // echo $resp2_decode->data->flight->source;
    //     // echo 'success';
    
    // return;
    
    
    
    
    
    
    
    
    // require_once "nusoap/nusoap.php";
    ini_set("soap.wsdl_cache_enabled", "0");
    
    
    $PIN = '07YH1ul3621hdrbfU5M2';
    $wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Sale/SaleService.asmx?WSDL";
    $site_call_back_url = "http://bahar360.ir/confirm/";
    
    $amount = $_POST['sum_alll'] ? $_POST['sum_alll'] : "1000";
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





