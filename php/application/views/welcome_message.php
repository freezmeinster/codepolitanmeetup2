<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link href="/css/style.css" rel="stylesheet"/>
	<link href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

<div id="container">
	<h1>Welcome to LaundryKu with odoo version <?php echo $version['server_serie']; ?></h1>

	<div id="body">
		<table class="table">
			<tr>
				<th>Invoice Code</th>
				<th>Customer</th>
				<th>State</th>
				<th>Total Price</th>
			</tr>
			<?php foreach ($invoice as $inv): ?>
			<tr>
				<td><a href="/invoice/view/<?php echo $inv["id"]; ?>"><?php echo $inv["name"]; ?></a></td>
				<td><?php echo $inv["customer"][1]; ?></td>
				<td><?php echo $inv["state"]; ?></td>
				<td><?php echo $inv["amount_total"]; ?></td>
			</tr>
			<?php endforeach ?>
			
		</table>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>