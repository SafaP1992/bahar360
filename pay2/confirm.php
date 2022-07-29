<?php
    /* Template Name: confirm */
?>

<?php get_header(); ?>

<?php
      
    //   // $check_token = $_POST['inputtoken'];
    
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
    
    
    // /*****************
    //   RESERVE POST
    //  ******************/
    // $curl2 = curl_init();
    // // Sample
    // $params_array = array(
    //   'api_token' => $resp_decode->token,
    //   'flight' => array(
    //     'source' => 'RAS',
    //     'destination' => 'THR'
    //   ),
    //   'payment' => array(
    //     'bank_code' => "123456789"
    //   ),
    //   'passengers' => array(
    //     array(
    //       'name' => 'ali',
    //       'age' => '30'
    //     ),
    //     array(
    //       'name' => 'hossein',
    //       'age' => '10'
    //     )
    //   ),
    
    // );
    
    // $params = http_build_query($params_array);
    // curl_setopt_array($curl2, [
    //   CURLOPT_RETURNTRANSFER => 1,
    //   CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/flight/reserve',
    //   CURLOPT_POST => 1,
    //   CURLOPT_POSTFIELDS => $params
    // ]);
    // $resp2 = curl_exec($curl2);
    // curl_close($curl2);
    // $resp2_decode = json_decode($resp2);
    // // echo $resp2_decode->data->api_token;
    // // echo $resp2_decode->data->flight->source;
    // echo $resp2_decode->data->passengers[0]->name;

      
    // // session_start();
    // // $token_laravel = $_SESSION['token'];
    // // $_SESSION['test'] = 'session1111';
    //     // echo $token_laravel;

    // Sample
    // $params_array = $json;
    // $FlightNo = $_POST['flight_number'];
    // $source = $_POST['source'];
    // $destination = $_POST['destination'];
    // $AirlineCode = $_POST['airline'];
    // $CabinType = $_POST['classs'];
    // $FlightType = $_POST['type'];
    // $PersianDepartureDate = $_POST['departure_date_fa'];
    // $DepartureDate = $_POST['departure_date_en'];
    // $DepartureTime = $_POST['departure_time_en'];
    // $FinalPrice = $_POST['price'];
    
    $FlightID = $_SESSION['FlightID'];
    $FlightType = $_SESSION['FlightType'];
    $AirlineName = $_SESSION['AirlineName'];
    $AirlineCode = $_SESSION['AirlineCode'];
    $AirlineLogo = $_SESSION['AirlineLogo'];
    $DepartureParentRegionName = $_SESSION['DepartureParentRegionName'];
    $DepartureDate = $_SESSION['DepartureDate'];
    $DepartureTime = $_SESSION['DepartureTime'];
    $PersianDepartureDate = $_SESSION['PersianDepartureDate'];
    $ArrivalParentRegionName = $_SESSION['ArrivalParentRegionName'];
    $ArrivalTime = $_SESSION['ArrivalTime'];
    $FlightNo = $_SESSION['FlightNo'];
    $Capacity = $_SESSION['Capacity'];
    $CabinType = $_SESSION['CabinType'];
    $FinalPrice = $_SESSION['FinalPrice'];
    $contact_number = $_SESSION['contact_number'];  
    $email_user = $_SESSION['email_user'];
    $Source = $_SESSION['Source'];
    $Destination = $_SESSION['Destination'];
    $json = $_SESSION['json'];
    
    $rand = rand(10000000,90000000);
    
    // echo $FlightID;
    // echo '<br/>';
    // echo $FlightType;
    // echo '<br/>';
    // echo $AirlineName;
    
        
        
    ini_set("soap.wsdl_cache_enabled", "0");
    
    $PIN = '07YH1ul3621hdrbfU5M2';
    $wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Confirm/ConfirmService.asmx?WSDL";
    
    $Token = $_REQUEST["Token"];
    $status = $_REQUEST["status"];
    $OrderId = $_REQUEST["OrderId"];
    $TerminalNo = $_REQUEST["TerminalNo"];
    $Amount = $_REQUEST["sum_alll"];
    $RRN = $_REQUEST["RRN"];
    
    $CardNumberMasked = $_REQUEST["CardNumberMasked"];
    
    $s = '';
    if($status == '0'){
        $s = 'success';
    }else{
        $s = 'faild';
    }
    
    
    if ($RRN > 0 && $status == 0) {

    	$params = array(
    		"LoginAccount" => $PIN,
    		"Token" => $Token
    	);
    
    	$client = new SoapClient($wsdl_url);
    
    	try {
    	    
    	    
    	    
    		$result = $client->ConfirmPayment(array(
    			"requestData" => $params
    		));
    		if ($result->ConfirmPaymentResult->Status != '0') {
    			$err_msg = "(<strong> کد خطا : " . $result->ConfirmPaymentResult->Status . "</strong>) " .
    				$result->ConfirmPaymentResult->Message;
    		}
    		
    		/*************
                LOGIN GET
             **************/
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/token?username=09153450308&password=123456',
            
            ]);
            $resp = curl_exec($curl);
            // if (!curl_exec($curl)) {
            //     echo 'خطای سرور برای دریافت توکن. ';
            //     echo 'مجدد تکرار نمائید';
            //     die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
            //     // return;
            // }
            curl_close($curl);
            $resp_decode = json_decode($resp);
            // echo $resp;
            // echo $resp_decode->token;
            // echo $resp_decode->status;
    
    
    
    	    /********************************************************************************************************/
            /******************
                RESERVE POST
             ******************/
            $curl2 = curl_init();
            $params_array = array(
                'api_token' =>  $resp_decode->token,
                'flight' => array(
                    'avid_ref_code' => 'safarbooking_'.$FlightID,
                    'flight_number' => $FlightNo,
                    'source' => $Source,
                    'destination' => $Destination,
                    'airline' => $AirlineCode,
                    'class' => $CabinType,
                    'type' => $FlightType,
                    'arrival_date_fa' => '0101-01-01',
                    'arrival_time_fa' => '01:01',
                    'arrival_date_en' => '0101-01-01',
                    'arrival_time_en' => '01:01',
                    'departure_date_fa' => $PersianDepartureDate,
                    'departure_time_fa' => '01:01',
                    'departure_date_en' => $DepartureDate,
                    'departure_time_en' => $DepartureTime
                ),
                'payment' => array(
                    'price' => $FinalPrice,
                    'order_id' => $OrderId,
                    'status' => $s,
                    'terminal_no' => $TerminalNo,
                    'dargah' => $CardNumberMasked,
                    'bank_token' => $Token,
                    'rrn' => $RRN
                ),
                'passengers' => json_decode($json)
            );
            
            // foreach ($_POST as $i => $value) {
            // 	$params_array['passengers'][$i]['name'] = 'name' . $value;
            // 	$params_array['passengers'][$i]['age'] = 'age' . $value;
            // }
        
            $params_s = http_build_query($params_array);
            // $params = $params_array;
            curl_setopt_array($curl2, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/flight/reserve',
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $params_s
            ]);
            $resp2 = curl_exec($curl2);
            curl_close($curl2);
            // json_encode($resp2, JSON_UNESCAPED_UNICODE);
            echo $resp2;
            $resp2_decode = json_decode($resp2);
            // echo $resp2_decode->data->api_token;
            // echo $resp2_decode->data->passengers;
            // echo $resp2_decode;
            // echo $resp2_decode->data->flight->source;
            // echo 'success';
    		/********************************************************************************************************/
    		
    
    
    
    
    
    		
    	} catch (Exception $ex) {
    		$err_msg =  $ex->getMessage();
    	}
    } elseif ($status) {
    // 	$err_msg = "کد خطای ارسال شده از طرف بانک $status " . "";
    	$err_msg = "پرداخت نشد";
    } else {
    
    	$err_msg = "پاسخی از سمت بانک ارسال نشد ";
    }
    
    
  
    		
    	    
    		

?>


<!--<!DOCTYPE html>-->
<!--<html>-->



<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!---->
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
	<title>پرداخت قبض</title>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jQuery v1.12.4.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
	<style type="text/css">
		.ltr {
			direction: ltr;
		}

		.rtl {
			direction: rtl;
		}

		th {
			width: 1% !important;
			white-space: nowrap;
		}
	</style>
</head>

<body class="rtl">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">پرداخت قبض</div>
			<div class="panel-body">
				<?php if ($err_msg) : ?>
					<div class="alert alert-danger alert-dismissible" role="alert"><?php echo $err_msg; ?></div>
				<?php else : ?>
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>وضعیت عملیات(Status)</th>
								<td>موفق</td>
							</tr>
							<tr>
								<th>شماره مرجع (RRN )</th>
								<td><?php echo $result->ConfirmPaymentResult->RRN ?></td>
							</tr>
							<tr>
								<th>شماره کارت (CardNumberMasked )</th>
								<td class="en"><?php echo $result->ConfirmPaymentResult->CardNumberMasked ?></td>
							</tr>
							<tr>
								<th>Token </th>
								<td><?php echo $result->ConfirmPaymentResult->Token ?></td>
							</tr>
							<tr>
								<th>مبلغ </th>
								<td><?php echo number_format($FinalPrice,0); // //number_format($Amount, 0);?></td>
							</tr>
							<tr>
								<th>شماره سفارش </th>
								<td><?php echo $OrderId; ?></td>
							</tr>
						</table>
					</div>

				<?php endif; ?>
				<a class="btn btn-info" href="/">بازگشت به خانه</a>
			</div>
		</div>
	</div>
</body>

<!--</html>-->


<?php get_footer(); ?>