<!DOCTYPE html>
	<?php include 'header.php';
		$count=1;
		$db= new dbconn();
		//$Account_no=$_POST['account_number'];
		$account_number=123123;
		$first_day_this_month = date('Y-m-01');
		$last_day_this_month  = date('Y-m-t');
		//$start_date=echo $Month_date.'01'
		$res=$db->select("Transaction","Transaction_date,Amount,Transaction_type,Account_balance","account_no=$account_number And  transaction_date BETWEEN '$first_day_this_month 00:00:00.00' AND '$last_day_this_month 23:59:59.999'");
	?>
		<body>
			<section class="">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Deposit</th>
						<th>Withdrawal</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($res as $table_content)
					{
						$amount=$table_content["Amount"];
						echo'<tr>
                        <td>'.$count.'</td>
							<td>'.$table_content["Transaction_date"].'</td>
							<td>'.(($table_content["Transaction_type"]=='0')?"0":$amount).'</td>
							<td>'.
							(($table_content["Transaction_type"]=='1')?"0":$amount).
							'</td>
							<td>'.$table_content["Account_balance"].'</td>
                        </tr>';
						$count++;
						
					}
				?>
				<tbody>

			</table>
			</section>
		</body>
	<?phpinclude 'footer.php';>
</html>