<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Invoice view</title>

	<link href="/css/style.css" rel="stylesheet"/>
	<link href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

<div id="container">
	<h1><a href="/">Back</a> || Ivoice number <?php echo $invoice[0]['name']; ?></h1>

	<div id="body">
		<table class="table">
			<tr><td>Customer</td><td>:</td><td><?php echo $invoice[0]['customer'][1]; ?></td></tr>
			<tr><td>State</td><td>:</td><td><?php echo $invoice[0]['state']; ?></td></tr>
			<tr><td>Total</td><td>:</td><td><?php echo $invoice[0]['amount_total']; ?></td></tr>
		</table>
		<table class="table table-bordered">
			<tr class="success">
				<th>Product</th>
				<th>Quantity</th>
			</tr>
			<?php foreach($invoice[0]['sales_lines'] as $line_id ): ?>
			<tr>
				<td><?php echo $lines[$line_id]['product'][1]; ?></td>
				<td><?php echo $lines[$line_id]['qty']; ?> Kg</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
	
	<?php if($invoice[0]['state'] == 'draft'): ?>
		<a class="btn btn-warning" href="/invoice/action/action_working/<?php echo $invoice[0]['id']; ?>">Working</a>
	<?php endif ?>
	<?php if($invoice[0]['state'] == 'working'): ?>
		<a class="btn btn-success" href="/invoice/action/action_done/<?php echo $invoice[0]['id']; ?>">Done</a>
		<a class="btn btn-danger" href="/invoice/action/action_cancel/<?php echo $invoice[0]['id']; ?>">Cancel</a>
	<?php endif ?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>