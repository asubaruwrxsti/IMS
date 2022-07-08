<html>

<body>
	<ul class="ul">
		<li class="li"><a class="a" href="/public/">Faturat Aktive</a></li>
		<li class="li"><a class="a" href="/public/create/">Krijo Fature</a></li>
		<li class="li"><a class="active a" href="/public/archivedView/">Arkiva</a></li>
		<li class="li"><a class="a" href="/public/inventory">Inventory</a></li>
	</ul>

	<h1> Arkiva </h1>

	<div class="container mx-auto border border-secondary rounded px-4 py-4 bg-light w-50">

		<table id="orders" class="display w-80">
			<thead>
				<tr>
					<th>ID</th>
					<th>Veprime</th>
				</tr>
				</thhead>
			<tbody>
				<?php foreach ($data->getResult() as $key) { ?>

					<tr>
						<td> <?php echo $key->BARCODE ?> </td>
						<td>

							<div class="form-group">
								<div class="row">

									<div class="col">

										<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $key->BARCODE ?>"> Info </button>

										<!-- Modal -->
										<div class="modal fade" id="<?php echo $key->BARCODE ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">

													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel"><?php echo $key->First_Name . " " . $key->Last_Name ?></h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>

													<div class="modal-body">

														<div class="container">
															<div class="row">

																<div class="col">
																	<p>Kontakt: <?php echo $key->Contact ?></p>
																	<p>Paisja: <?php echo $key->Device ?></p>
																	<p>Sasia: <?php echo $key->Qty ?></p>
																	<p>Komente: <?php echo $key->Comments ?></p>
																	<p>Dorezuesi: <?php echo $key->Operator_Dispatch ?></p>
																	<p>Marresi: <?php echo $key->Operator ?></p>
																	<p>Data e hyrjes: <?php echo $key->Date_Entry ?></p>
																	<p>Cmimi: <?php echo $key->Price ?></p>
																</div>

																<div class="col">
																	<img class="rounded mx-auto d-block" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A<?php echo $key->BARCODE ?>&choe=UTF-8" />
																</div>

																<div class="row">
																	<div class="col">
																		<?php if ($key->Status_Paid == 1) {
																			echo "<button class='statusTrue btn btn-success'>Paguar</button>";
																		} else {
																			echo "<button class='statusFalse btn btn-danger'>Pa Paguar</button>";
																		} ?>

																		<?php if ($key->Status_Repaired == 1) {
																			echo "<button class='statusTrue btn btn-success'>Riparuar</button>";
																		} else {
																			echo "<button class='statusFalse btn btn-danger'>Pa Riparuar</button>";
																		} ?>

																		<?php if ($key->Status_Dispatched == 1) {
																			echo "<button class='statusTrue btn btn-success'>Dorezuar</button>";
																		} else {
																			echo "<button class='statusFalse btn btn-danger'>Pa Dorezuar</button>";
																		} ?>
																	</div>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>

										<button class='print btn btn-secondary' value='<?php echo $key->ID ?>'>Print</button>
										<button class='edit btn btn-warning' value='<?php echo $key->ID ?>'>Edit</button>
										<button class='delete btn btn-danger' value='<?php echo $key->ID ?>'>Delete</button>

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
	var table = $('#orders').DataTable();

	$(".edit").click(function() {
		location.href = "/public/edit/" + $(this).val();
	});

	$(".delete").click(function() {
		$.ajax({
			url: "/public/delete/" + $(this).val(),
			type: "POST",
			success: function() {
				location.href = "/";
			}
		});
	});

	$(".print").click(function() {
		var newWindow = window.open('/public/print/' + $(this).val());
	});
</script>

</html>