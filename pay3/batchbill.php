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

		.m5 {
			margin: 5px;
		}
	</style>
</head>

<body class="rtl">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">پرداخت چند قبض</div>
			<div class="panel-body">


				<div class="m5 ">

					<div class="form-group">
						<label class="" for="BillId">شناسه قبض :</label> <input class=" ltr" type="text" name="BillId" id="BillId" value="">
					</div>
					<div class="form-group">
						<label class="" for="PayId">شناسه پرداخت :</label> <input class=" ltr" type="text" name="PayId" id="PayId" value="">
					</div>
					<button id="add" class="btn btn-info" onclick="add();">افزودن</button>
				</div>
				</fieldset>


				<form class="m5" action="/batchpayment.php" method="post" id="multi" enctype='multipart/form-data'>
					<div class="table-responsive">
						<table id="list" class="table table-bordered">
							<tr>

								<th>شناسه قبض</th>
								<th>شناسه پرداخت</th>
								<th></th>
							</tr>
						</table>
					</div>
					<input type="submit" class="btn btn-primary" value="پرداخت">
				</form>
				<a class="btn btn-success" href="/">بازگشت به خانه</a>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function add() {
			var BillId = document.getElementById("BillId").value;
			var PayId = document.getElementById("PayId").value;

			if (BillId.length > 0 && PayId.length > 0) {
				var table = document.getElementById("list");
				var index = table.rows.length;

				var row = table.insertRow(index);
				row.innerHTML =
					'<td><input type="hidden" name="frm_BillId[' + index + ']" value="' + BillId + '" >' + BillId + '</td>' +
					'<td><input type="hidden" name="frm_PayId[' + index + ']" value="' + PayId + '" >' + PayId + '</td>' +
					'<td><a href="javascript:void(0)" onclick="removeRow(this)">حذف</a></td>';

			}


		}

		function removeRow(obj) {
			var _row = obj.parentElement.parentElement;
			document.getElementById('list').deleteRow(_row.rowIndex);
		}
	</script>
</body>

</html>