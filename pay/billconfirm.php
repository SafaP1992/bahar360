<?php

$PIN = '07YH1ul3621hdrbfU5M2';
$wsdl_url = "https://pec.shaparak.ir/NewIPGServices/Bill/BillService.asmx?WSDL";

$Token = $_REQUEST["Token"];
$status = $_REQUEST["status"];
$OrderId = $_REQUEST["OrderIds"];
$TerminalNo = $_REQUEST["TerminalNo"];
$RRN = $_REQUEST["RRN"];
$BillId = $_REQUEST["BillId"];
$PayId = $_REQUEST["PayId"];
$Amount = $_REQUEST["Amount"];


if ($RRN > 0 && $status == 0) {

	$params = array(
		"token" => $Token
	);

	$client = new SoapClient($wsdl_url);

	try {
		$result = $client->GetBillInfoData(
			$params
		);

		if ($result->GetBillInfoDataResult->Status != '0') {
			$err_msg = "(<strong> کد خطا : " . $result->GetBillInfoDataResult->Status . "</strong>) " .
				$result->GetBillInfoDataResult->Message;
		}
	} catch (Exception $ex) {
		$err_msg = $ex->getMessage();
	}
} elseif ($status) {
	$err_msg = "کد خطای ارسال شده از طرف بانک $status " . "";
} else {

	$err_msg = "پاسخی از سمت بانک ارسال نشد ";
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<title>پرداخت قبض</title>
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
				<?php else : ?>
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th>مبلغ</th>
								<td><?php echo number_format($result->GetBillInfoDataResult->Amount, 0); ?></td>
							</tr>
							<tr>
								<th>نوع قبض</th>
								<td><?php echo $result->GetBillInfoDataResult->BillType ?></td>
							</tr>
							<tr>
								<th>UtilityCode</th>
								<td class="en"><?php echo $result->GetBillInfoDataResult->UtilityCode ?></td>
							</tr>
							<tr>
								<th>SubUtilityCode </th>
								<td><?php echo $result->GetBillInfoDataResult->SubUtilityCode ?></td>
							</tr>
							<tr>
								<th>نام سازمان </th>
								<td><?php echo $result->GetBillInfoDataResult->CompanyName ?></td>
							</tr>
							<tr>
								<th>کد وضعیت </th>
								<td><?php echo $result->GetBillInfoDataResult->Status; ?></td>
							</tr>
							<tr>
								<th>شرح عملیات </th>
								<td><?php echo $result->GetBillInfoDataResult->StatusDescription; ?></td>
							</tr>
							<tr>
								<th>زمان انجام تراکنش </th>
								<td><?php echo $result->GetBillInfoDataResult->RequestDateTime; ?></td>
							</tr>
						</table>
					</div>

				<?php endif; ?>
				<a class="btn btn-info" href="/">بازگشت به خانه</a>
			</div>
		</div>
	</div>
</body>

</html>