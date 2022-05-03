<html>

<head>
	<script src="../public/node_modules/jquery/dist/jquery.js"></script>

	<script type="text/javascript" src="../public/bootstrap3-typeahead.js"></script>
	<link href="../public/bootstrap.css" rel="stylesheet">
	<link href="../public/typeaheadjs.css" rel="stylesheet">

	<script type="text/javascript" src="../public/node_modules/datatables.net/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

		.actions {
			display: flex;
			width: 200px;
			align-items: center;
		}

		button:hover {
			background: #808080;
		}

		.statusTrue {
			background-color: #04AA6D;
			pointer-events: none;
		}

		.statusFalse {
			background-color: #f54242;
			pointer-events: none;
		}

		.extra {
			border: 1px solid black;
			border-collapse: collapse;
		}

		table.dataTable thead th,
		table.dataTable thead td {
			padding: 10px 68px;
			border-bottom: 1px solid #111;
		}
	</style>
</head>

<body>
	<ul class="ul">
		<li class="li"><a class="active a" style="cursor: pointer;">Faturat Aktive</a></li>
		<li class="li"><a class="a" href="create/">Krijo Fature</a></li>
		<li class="li"><a class="a" href="archivedView/">Arkiva</a></li>
	</ul> </br>

	<h1> Faturat Aktive </h1> </br>

	<table id="orders" class="display">

		<thead>
			<tr>
				<th>ID</th>
				<th>Paisja</th>
				<th>Data</th>
				<th>Kontakt</th>
				<th>Statusi</th>
				<th>Veprime</th>
				<th>Detaje</th>
			</tr>
		</thead>
		<tbody>

			<?php
			//$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
			foreach ($data->getResult() as $key) {
			?>
				<tr>
					<td>
						<p> <?php echo $key->BARCODE ?> </p>
					</td>
					<td>
						<p> <?php echo $key->Device ?> </p>
					</td>
					<td>
						<p> <?php echo $key->Date_Entry ?> </p>
					</td>
					<td>
						<p> <?php echo $key->Contact ?> </p>
					</td>
					<?php if ($key->Status_Repaired == 0) echo "<td><button class='statusFalse' >Pa_riparuar</button></td>";
					else echo "<td><button class='statusTrue'>Riparuar</button></td>";
					?>
					<td class="actions">
						<button class='print' value='<?php echo $key->ID ?>'>Print</button>
						<button class='edit' value='<?php echo $key->ID ?>'>Edit</button>
						<button class='delete' value='<?php echo $key->ID ?>'>Delete</button>
					</td>
					<td>
						<div class="container">
							<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?php echo $key->ID ?>"> + </button>
							<div id="<?php echo $key->ID ?>" class="collapse">
								<br>
								<table class="extra">
									<tr>
										<td>
											<p> Komente: </p>
										</td>
										<td>
											<p> <?php echo $key->Comments ?> </p>
										</td>
									</tr>
									<tr>
										<td>
											<p>Klienti:</p>
										</td>
										<td>
											<?php echo $key->First_Name . " " . $key->Last_Name ?>
										</td>
									</tr>
									<tr>
										<td>
											<p>Sasia:</p>
										</td>
										<td>
											<?php echo $key->Qty ?>
										</td>
									</tr>
									<tr>
										<td>
											<p>Marresi:</p>
										</td>
										<td>
											<?php echo $key->Operator ?>
										</td>
									</tr>
									<tr>
										<td>
											<p>Barkodi:</p>
										</td>
										<td>
											<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http%3A'<?php echo $key->BARCODE ?>'&choe=UTF-8" />
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>

<script>
	$(document).ready(function() {
		var dataSrc = [];

		var table = $('#orders').DataTable({
			"order": [
				[2, "desc"]
			],
			'initComplete': function() {
				var api = this.api();

				// Populate a dataset for autocomplete functionality
				// using data from first, second and third columns
				api.cells('tr', [3, 4, 5, 7]).every(function() {
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
		location.href = "/edit/" + $(this).val();
	});

	$(".delete").click(function() {
		$.ajax({
			url: "/delete/" + $(this).val(),
			type: "POST",
			success: function() {
				location.href = "/";
			}
		});
	});

	$(".print").click(function() {
		var newWindow = window.open('/print/' + $(this).val());
	});
</script>

</html>