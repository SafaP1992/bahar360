<?php

require_once "nusoap/nusoap.php";
ini_set("soap.wsdl_cache_enabled", "0");

$PIN = '07YH1ul3621hdrbfU5M2';
$wsdl_url = "https://pec.shaparak.ir/NewIPGServices/MultiplexedSale/OfflineMultiplexedSalePaymentService.asmx?WSDL";
$site_call_back_url = "http://pecco.dorgoon.com/confirm.php";

$MultiplexedItems = array();

$amount = $_POST['Amount'] ? $_POST['Amount'] : "1000";
$order_id = $_POST['OrderId'] ? $_POST['OrderId'] : "500";
// تقسیم سهم بین دو حساب
// نفر اول سی در صد
// نفر دوم هفتاد درصد
$MultiplexedItems[] = array(
	"Iban" => "IR470540101602000171175002",
	"Amount" => (int) ($amount * 0.3)
);
$MultiplexedItems[] = array(
	"Iban" => "IR140540101602000192357001",
	"Amount" => $amount - ((int) ($amount * 0.3))
);
$params = array(
	"LoginAccount" => $PIN,
	"Amount" => $amount,
	"OrderId" => $order_id,
	"CallBackUrl" => $site_call_back_url,
	"MultiplexedItems" => $MultiplexedItems
);

$client = new SoapClient($wsdl_url);

try {
	$result = $client->MultiplexedSalePaymentRequest(array(
		"requestData" => $params
	));

	if ($result->MultiplexedSalePaymentRequestResult->Token && $result->MultiplexedSalePaymentRequestResult->Status === 0) {
		header("Location: https://pec.shaparak.ir/NewIPG/?Token=" . $result->MultiplexedSalePaymentRequestResult->Token); /* Redirect browser */
		exit();
	} elseif ($result->MultiplexedSalePaymentRequestResult->Status != '0') {
		$err_msg = "(<strong> کد خطا : " . $result->MultiplexedSalePaymentRequestResult->Status . "</strong>) " . $result->MultiplexedSalePaymentRequestResult->Message;
	}
} catch (Exception $ex) {
	$err_msg =  $ex->getMessage();
}

?>



<!DOCTYPE html>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>تسهیم آفلاین</title>
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
			<div class="panel-heading">تسهیم آفلاین</div>
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