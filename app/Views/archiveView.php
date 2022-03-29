<html>

<head>
	<script src="node_modules\jquery\dist\jquery.js" type="text/javascript"></script>

	<script type="text/javascript" src="bootstrap3-typeahead.js"></script>
	<link href="bootstrap.css" rel="stylesheet">
	<link href="typeaheadjs.css" rel="stylesheet">

	<script type="text/javascript" src="node_modules\datatables.net\js\jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

</head>

<style>
	.ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
		position: sticky;
		top: 0;
		width: 100%;
	}

	.li {
		float: left;
	}

	.li .a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	.li .a:hover:not(.active) {
		background-color: #111;
	}

	.active {
		background-color: #04AA6D;
	}

	button {
		padding: 5px 10;
		margin: 5px auto;
		border-radius: 5px;
		border: none;
		background: #bdbcbb;
		color: #fff;
	}

	button:hover {
		background: #808080;
	}

	.statusTrue {
		background-color: #04AA6D;
		border: none;
		color: white;
		padding: 5px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
	}

	.statusFalse {
		background-color: #f54242;
		border: none;
		color: white;
		padding: 5px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
	}
</style>

<body>
	<ul class="ul">
		<li class="li"><a class="a" href="/public/">Faturat Aktive</a></li>
		<li class="li"><a class="a" href="/public/create/">Krijo Fature</a></li>
		<li class="li"><a class="active a" style="cursor: pointer;">Arkiva</a></li>
	</ul> </br>

	<h1> Arkiva </h1> </br> </br>
	<table id="orders" class="display">
		<thead>
			<tr>
				<th>ID</th>
				<th>Data e hyrjes</th>
				<th>Data e daljes</th>
				<th>Klienti</th>
				<th>Kontakt</th>
				<th>Marresi</th>
				<th>Paisja</th>
				<th>Sasia</th>
				<th>Riparuar</th>
				<th>Cmimi</th>
				<th>Paguar</th>
				<th>Dorezuar</th>
				<th>Dorezuesi</th>
				<th>Komente</th>
				<th>Veprime</th>
			</tr>
			</thhead>
		<tbody>

			<?php
			$generator = new Picqer\Barcode\BarcodeGeneratorPNG();

			foreach ($data->getResult() as $key) {
				echo "<tr> <td>" . $key->BARCODE . "</td>";
				echo "<td>" . $key->Date_Entry . "</td>";
				echo "<td>" . $key->Date_Dispatched . "</td>";
				echo "<td>" . $key->First_Name . " " . $key->Last_Name . "</td>";
				echo "<td>" . $key->Contact . "</td>";
				echo "<td>" . $key->Operator . "</td>";
				echo "<td>" . $key->Device . "</td>";
				echo "<td>" . $key->Qty . "</td>";
				if ($key->Status_Repaired == 0) echo "<td><button class='statusFalse'>Pa Riparuar</button></td>";
				else echo "<td><button class='statusTrue'>Riparuar</button></td>";
				echo "<td>" . $key->Price . "</td>";
				if ($key->Status_Paid == 0) echo "<td><button class='statusFalse'>Pa Paguar</button></td>";
				else echo "<td><button class='statusTrue'>Paguar</button></td>";
				if ($key->Status_Dispatched == 0) echo "<td><button class='statusFalse'>Pa Dorezuar</button></td>";
				else echo "<td><button class='statusTrue'>Dorezuar</button></td>";
				echo "<td>" . $key->Operator_Dispatch . "</td>";
				echo "<td>" . $key->Comments . "</td>";
				echo "<td> <button class='print' value = '" . $key->ID . "'>Print</button> <button class='edit' value = '" . $key->ID . "'>Edit</button> <button class='delete' value = '" . $key->ID . "'>Delete</button> </td> </tr>";
			}
			?>

		</tbody>
	</table>
</body>

<script>
	$(document).ready(function() {
		var dataSrc = [];

		var table = $('#orders').DataTable({
			"order": [
				[1, "desc"]
			],
			'initComplete': function() {
				var api = this.api();

				// Populate a dataset for autocomplete functionality
				// using data from first, second and third columns
				api.cells('tr', [0, 1, 2]).every(function() {
					// Get cell data as plain text
					var data = $('<div>').html(this.data()).text();
					if (dataSrc.indexOf(data) === -1) {
						dataSrc.push(data);
					}
				});

				// Sort dataset alphabetically
				dataSrc.sort();

				// Initialize Typeahead plug-in
				$('.dataTables_filter input[type="search"]', api.table().container())
					.typeahead({
						source: dataSrc,
						afterSelect: function(value) {
							api.search(value).draw();
						}
					});
			}
		});
	});

	$(".edit").click(function() {
		location.href = "edit/" + $(this).val();
	});

	$(".delete").click(function() {
		$.ajax({
			url: "delete/" + $(this).val(),
			type: "POST",
			success: function() {
				location.href = "/";
			}
		});
	});

	$(".print").click(function() {
		var newWindow = window.open('print/' + $(this).val());
	});
</script>

</html>