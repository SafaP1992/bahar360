<?php
ini_set("soap.wsdl_cache_enabled", "0");

$PIN = '07YH1ul3621hdrbfU5M2';
$wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Bill/BillService.asmx?WSDL";
$site_call_back_url = "http://pecco.dorgoon.com/billconfirm.php";

// 	$amount = $_POST['Amount'] ? $_POST['Amount'] : "1000" ;
$order_id = $_POST['OrderId'] ? $_POST['OrderId'] : "500";
$bill_id = $_POST['BillId'] ? $_POST['BillId'] : "";
$pay_id = $_POST['PayId'] ? $_POST['PayId'] : "";

$params = array(
	"LoginAccount" => $PIN,
	"Amount" => 0,
	"OrderId" => $order_id,
	"CallBackUrl" => $site_call_back_url,
	"BillId" => $bill_id,
	"PayId" => $pay_id
);


$client = new SoapClient($wsdl_url);

try {
	$result = $client->BillPaymentRequest(array(
		"requestData" => $params
	));

	if ($result->BillPaymentRequestResult->Status === 0 && $result->BillPaymentRequestResult->Token) {
		header("Location: https://pec.shaparak.ir/NewIPG/?Token=" . $result->BillPaymentRequestResult->Token); /* Redirect browser */
		exit();
	} elseif ($result->BillPaymentRequestResult->Status  != '0') {
		$err_msg = "(<strong> کد خطا : " . $result->BillPaymentRequestResult->Status . "</strong>) " .
			$result->BillPaymentRequestResult->Message;
	}
} catch (Exception $ex) {
	$err_msg =  $ex->getMessage();
}


?>



<!DOCTYPE html>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>پرداخت قبض</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="/js/jQuery v1.12.4.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
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
			<div class="panel-heading">پرداخت قبض</div>
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