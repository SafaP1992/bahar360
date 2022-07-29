<?php
ini_set("soap.wsdl_cache_enabled", "0");
if (!$_POST) {
}
$PIN = '07YH1ul3621hdrbfU5M2';
$wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Bill/BillService.asmx?WSDL";
$site_call_back_url = "http://pecco.dorgoon.com/batchconfirm.php";

$items = array();
foreach ($_POST['frm_BillId'] as $key => $bill_id) {

	$items[] = array(
		"LoginAccount" => $PIN,
		// "Amount" => $amount,
		"OrderId" => time() + $key,
		"BillId" => $bill_id,
		"PayId" => $_POST['frm_PayId'][$key]
	);
}

$params = array(
	"CallBackUrl" => $site_call_back_url,
	"BillItems" => $items
);

$client = new SoapClient($wsdl_url);

try {
	$result = $client->BatchBillPaymentRequest(array(
		"requestData" => $params
	));

	if ($result->BatchBillPaymentRequestResult->Status != '0') {
		$err_msg = "(<strong> کد خطا : " . $result->BatchBillPaymentRequestResult->Status . "</strong>) " . $result->BatchBillPaymentRequestResult->Message;
	} elseif (!$result) {
		$err_msg =  "جوابی از طرف سرویس دهنده داده نشد";
	}
} catch (Exception $ex) {
	$err_msg = $ex->getMessage();
}

?>



<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<title>پرداخت چند قبض</title>
	<script type="text/javascript" src="/js/jQuery v1.12.4.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
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
				<?php endif; ?>
				<?php if ($result->BatchBillPaymentRequestResult->Status != 0 || $result->BatchBillPaymentRequestResult->BatchToken) : ?>
					<table class="table  table-bordered">
						<tr>
							<th>نام سازمان صادرکنندة قبض</th>
							<th>شناسة قبض</th>
							<th>شناسة پرداخت</th>
							<th>مبلغ قبض</th>
							<th>وضعیت</th>
						</tr>
						<?php foreach ($result->BatchBillPaymentRequestResult->BillItems->ClientBatchBillPaymentResponseDataItem as $item) : ?>
							<tr>
								<td><?php echo $item->OrganizationName ?></td>
								<td><?php echo $item->BillId ?></td>
								<td><?php echo $item->PayId ?></td>
								<td><?php echo $item->Amount ?></td>
								<td><?php echo $item->Message . ($item->Message->Status ? "({$item->Message->Status})" : "") ?></td>
							</tr>
						<?php endforeach; ?>
					</table>
					<?php if ($result->BatchBillPaymentRequestResult->Status === 0 && $result->BatchBillPaymentRequestResult->BatchToken) : ?>
						<a class="btn btn-primary" href="https://pec.shaparak.ir/NewIPG/?Token=<?php echo $result->BatchBillPaymentRequestResult->BatchToken ?>">پرداخت
						</a>
					<?php endif; ?>
				<?php endif; ?>
				<a class="btn btn-success" href="/batchbill.php">بازگشت </a>
			</div>
		</div>
	</div>

</body>

</html>