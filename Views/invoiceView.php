<html>

<body>
	<ul class="ul">
		<li class="li"><a class="active a" href="/public/">Faturat Aktive</a></li>
		<li class="li"><a class="a" href="/public/create/">Krijo Fature</a></li>
		<li class="li"><a class="a" href="/public/archivedView/">Arkiva</a></li>
		<li class="li"><a class="a" href="/public/inventory">Inventory</a></li>
	</ul>

	<h1> Faturat Aktive </h1>

	<div class="container mx-auto border border-secondary rounded px-4 py-4 bg-light">

		<div class="form-group pt-3 mb-3">
			<div class="row">

				<div class="col col-auto">
					<div class="input-group mb-3 pl-5">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Minimum date</span>
						</div>
						<input type="text" id="min" name="min" class="form-control">
					</div>
				</div>

				<div class="col col-auto">
					<div class="input-group mb-3 pl-5">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Maximum date</span>
						</div>
						<input type="text" id="max" name="max" class="form-control">
					</div>
				</div>
			</div>
		</div>

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
						<?php if ($key->Status_Repaired == 0) echo "<td><button class='status_repaired statusFalse btn btn-danger' value=".$key->ID.">Pa riparuar</button></td>";
						else echo "<td><button class='status_repaired statusTrue btn btn-success'value=".$key->ID.">Riparuar</button></td>";
						?>
						<td>
							<button class='print btn btn-secondary' value='<?php echo $key->ID ?>'>Print</button>
							<button class='edit btn btn-warning' value='<?php echo $key->ID ?>'>Edit</button>
							<button class='delete btn btn-danger' value='<?php echo $key->ID ?>'>Delete</button>
						</td>
						<td>

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $key->BARCODE ?>">
								+
							</button>

							<!-- Modal -->
							<div class="modal fade" id="<?php echo $key->BARCODE ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLongTitle"><?php echo $key->First_Name . " " . $key->Last_Name ?></h5>
										</div>
										<div class="modal-body">
											<img class="rounded mx-auto d-block" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A<?php echo $key->BARCODE ?>&choe=UTF-8" />
											<p>Sasia: <?php echo $key->Qty ?> </p>
											<p>Marresi: <?php echo $key->Operator ?> </p>
											<p>Cmimi: <?php echo $key->Price ?> </p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

<script>
	var minDate, maxDate;

	// Custom filtering function which will search data in column four between two values
	$.fn.dataTable.ext.search.push(
		function(settings, data, dataIndex) {
			var min = minDate.val();
			var max = maxDate.val();
			var date = new Date(data[2]);

			if (
				(min === null && max === null) ||
				(min === null && date <= max) ||
				(min <= date && max === null) ||
				(min <= date && date <= max)
			) {
				return true;
			}
			return false;
		}
	);

	$(document).ready(function() {
		var dataSrc = [];

		// Create date inputs
		minDate = new DateTime($('#min'), {
			format: 'L'
		});
		maxDate = new DateTime($('#max'), {
			format: 'L'
		});

		var table = $('#orders').DataTable({
			autoFill: true,
			"order": [
				[2, "desc"]
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

		// Refilter the table
		$('#min, #max').on('change', function() {
			table.draw();
		});

	});

	$(".edit").click(function() {
		location.href = "/public/edit/" + $(this).val();
	});

	$(".delete").click(function() {
		$.ajax({
			url: "/public/delete/" + $(this).val(),
			type: "POST",
			success: function(data) {
				location.reload();
			}
		});
	});

	$(".print").click(function() {
		var newWindow = window.open('/print/' + $(this).val());
	});

	$(".status_repaired").click(function() {
		$.ajax({
			url: "/public/status_repaired/" + $(this).val(),
			type: "POST",
			success: function() {
				location.href = "/public/";
			}
		});
	});

</script>

</html>