
<?
include ("db.php");

$sql="SELECT COUNT(InvoiceID) from transactioninfo";
$r=mysqli_query($conn,$sql);
$f=mysqli_fetch($r);
$num=$f+1;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<span><img alt="" src="book.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Customer Name:<br>name</p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable> </span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>Taka   </span><span></span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Item</span></th>
						<th><span contenteditable>Description</span></th>
						<th><span contenteditable>Rate</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span contenteditable></span></td>
						<td><span contenteditable></span></td>
						<td><span data-prefix></span><span contenteditable></span></td>
						<td><span contenteditable></span></td>
						<td><span data-prefix></span><span></span></td>
					</tr>
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix></span><span></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>taka </span><span contenteditable>0.00</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>taka </span><span>0.00</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>Sold goods will not be returned .</p>
			</div>
		</aside>
	</body>
</html>