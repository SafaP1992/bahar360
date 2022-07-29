<?php
$PIN = '07YH1ul3621hdrbfU5M2';
$wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Bill/BillService.asmx?WSDL";

$status = $_REQUEST["status"];
$BatchToken = $_REQUEST["BatchToken"];
// print_r($_REQUEST);
//var_dump($_REQUEST);die;


if ($BatchToken > 0 && $status == 0) {

	$params = array(
		"batchToken" => $BatchToken
	);

	$client = new SoapClient($wsdl_url);

	try {
		$result = $client->GetBatchBillInfo($params);

		if (count($result->GetBatchBillInfoResult->ClientBatchBillPaymentInfoResponseData) == '0') {
			$err_msg = "(<strong> کد خطا : " . $result->GetBillInfoDataResult->Status . "</strong>) " .
				$result->GetBillInfoDataResult->Message;
		}
	} catch (Exception $ex) {
		$err_msg =  $ex->getMessage();
	}
} elseif ($status) {
	$err_msg = "کد خطای ارسال شده از طرف بانک $status ";
} else {

	$err_msg = "پاسخی از سمت بانک ارسال نشد ";
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
	</style>
</head>

<body class="rtl">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">پرداخت چند قبض</div>
			<div class="panel-body">
				<?php if ($err_msg) : ?>
					<div class="alert alert-danger alert-dismissible" role="alert"><?php echo $err_msg; ?></div>
				<?php else : ?>
					<div class="table-responsive">

						<table class="table">
							<thead>
								<tr>
									<th>شناسه قبض</th>
									<th>شناسه پرداخت</th>
									<th>مبلغ</th>
									<th>نوع قبض</th>
									<th>نام سازمان</th>
									<th>شرح عملیات</th>
									<th>وضعیت</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result->GetBatchBillInfoResult->ClientBatchBillPaymentInfoResponseData as $val) : ?>
									<tr>
										<td><?php echo $val->BillId ?></td>
										<td><?php echo $val->PayId ?></td>
										<td><?php echo $val->Amount ?></td>
										<td><?php echo $val->billType ?></td>
										<td><?php echo $val->CompanyName ?></td>
										<td><?php echo $val->StatusDescription ?></td>
										<td><?php echo $val->Status ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>
				<a class="btn btn-success" href="/batchbill.php">بازگشت </a>
			</div>
		</div>
	</div>
</body>

</html>