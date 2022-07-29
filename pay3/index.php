<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<link rel="stylesheet" href="pay/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="pay/js/jQuery v1.12.4.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="pay/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
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
			<div class="panel-heading">SalePaymentRequest</div>
			<div class="panel-body">
				<form action="/pay/payment.php" method="post" class="form-inline" id="SalePaymentRequest">
					<div class="form-group">
						<label class="w100" for="Amount">مبلغ :</label> <input class="w200 ltr" type="text" name="Amount" id="Amount" value="">
					</div>
					<div class="form-group">
						<label class="w100" for="OrderId">شماره سفارش :</label> <input class="w200 ltr" type="text" name="OrderId" id="OrderId" value="">
					</div>

					<input type="submit" class="btn btn-success" value="پرداخت">
				</form>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">BillPaymentRequest</div>
			<div class="panel-body">
				<form action="/pay/billpayment.php" method="post" id="BillPaymentRequest">

					<div class="form-group">
						<label class="w100" for="Bill-OrderId">شماره سفارش :</label> <input class="w200 ltr" type="text" name="OrderId" id="Bill-OrderId" value="">
					</div>
					<div class="form-group">
						<label class="w100" for="BillId">شناسه قبض :</label> <input class="w200 ltr" type="text" name="BillId" id="BillId" value="">
					</div>
					<div class="form-group">
						<label class="w100" for="PayId">شناسه پرداخت :</label> <input class="w200 ltr" type="text" name="PayId" id="PayId" value="">
					</div>

					<input type="submit" class="btn btn-success" value="پرداخت">
				</form>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">BatchBillPaymentRequest</div>
			<div class="panel-body">
				<a class="btn btn-info" href="/batchbill.php">پرداخت چند قبض</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">تسهیم آفلاین</div>
					<div class="panel-body">
						<form action="/pay/offlinepayment.php" method="post" class="form-inline" id="SalePaymentRequest">
							<div class="form-group">
								<label class="w100" for="Amount">مبلغ :</label> <input class="w200 ltr" type="text" name="Amount" id="Amount" value="">
							</div>
							<div class="form-group">
								<label class="w100" for="OrderId">شماره سفارش :</label> <input class="w200 ltr" type="text" name="OrderId" id="OrderId" value="">
							</div>

							<input type="submit" class="btn btn-success" value="پرداخت">
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">تسهیم آنلاین</div>
					<div class="panel-body">
						<form action="/pay/onlinepayment.php" method="post" class="form-inline" id="SalePaymentRequest">
							<div class="form-group">
								<label class="w100" for="Amount">مبلغ :</label> <input class="w200 ltr" type="text" name="Amount" id="Amount" value="">
							</div>
							<div class="form-group">
								<label class="w100" for="OrderId">شماره سفارش :</label> <input class="w200 ltr" type="text" name="OrderId" id="OrderId" value="">
							</div>

							<input type="submit" class="btn btn-success" value="پرداخت">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>