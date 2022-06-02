<html>

<body>

    <ul class="ul">
        <li class="li"><a class="a" href="/">Faturat Aktive</a></li>
        <li class="li"><a class="a" href="/create/">Krijo Fature</a></li>
        <li class="li"><a class="a" href="/archivedView/">Arkiva</a></li>
        <li class="li"><a class="active a" href="/inventory">Inventory</a></li>
    </ul>

    <h1>Inventory</h1>

    <div class="container mb-2" id="main">

        <!-- ADD PRODUCT -->

        <button type="button" id="add" class="btn btn-secondary" data-toggle="modal" data-target="#addModal">
            Add
        </button>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new product</h5>
                    </div>
                    <form id="addForm">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product">Product</label>
                                    <input class="form-control" id="product" placeholder="Product" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qty">Qty</label>
                                    <input type="number" class="form-control" id="qty" placeholder="Qty" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="SN">SN</label>
                                <input type="text" class="form-control" id="SN" placeholder="Serial Number (Optional)">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="closeAddButton" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- END ADD PRODUCT -->

        <!-- EDIT PRODUCT -->

        <button type="button" id="edit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal">
            Edit
        </button>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modal Title">Edit Product</h5>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product">Product</label>
                                    <input class="form-control" id="product_edit" placeholder="Product" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qty">Qty</label>
                                    <input type="number" class="form-control" id="qty_edit" placeholder="Qty" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="SN">SN</label>
                                <input type="text" class="form-control" id="SN_edit" placeholder="Serial Number (Optional)">
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="closeEditButton" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- END EDIT PRODUCT -->

        <!-- REMOVE PRODUCT -->

        <button type="button" id="rem" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#removeModal">
            Remove
        </button>

        <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to remove ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button id="remove" type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END REMOVE PRODUCT -->

        <!-- END MB-2 PL-2 -->
    </div>

    <div class="container mx-auto border border-secondary rounded px-4 py-4 bg-light">
        <!--- TABLE -->

        <table id="inventory">
            <thead>
                <th>Produkti</th>
                <th>SN</th>
                <th>Sasia</th>
            </thead>
            <tbody>
                <?php foreach ($inventory->getResult() as $item) : ?>
                    <tr>
                        <td id="<?= $item->id ?>"><?= $item->product ?></td>
                        <td id="serial_number"><?= $item->SN ?></td>
                        <td id="quantity"><?= $item->qty ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!--- END TABLE -->

    <!-- TOAST -->

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="Toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong id="title" class="me-auto"></strong>
                <small id="time"></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            </div>
        </div>
    </div>

    <!-- END TOAST -->

</body>

<script>
    $(document).ready(function() {
        var table = $('#inventory').DataTable();
        $('#edit').prop('disabled', true);
        $('#rem').prop('disabled', true);


        $('#inventory tbody').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');

                $('#edit').prop('disabled', true);
                $('#rem').prop('disabled', true);
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');

                $('#edit').prop('disabled', false);
                $('#rem').prop('disabled', false);
            }
        });

        //get toast element
        var toast_element = document.getElementById('Toast');

        //remove from tr and inventory db
        $('#remove').click(function() {
            var product_id = $('.selected').find('td:first').attr('id');

            //set toast fields
            $('#title').text("Success");
            $('#time').text("Just now");
            $('.toast-body').text("Product removed successfully");

            //show toast
            var toast = new bootstrap.Toast(toast_element);
            toast.show();

            //ajax delete
            $.ajax({
                url: '/inventory/delete/' + product_id,
                type: 'DELETE',
                success: function(result) {
                    table.row('.selected').remove().draw(false);

                    //set toast fields
                    $('#title').text("Success");
                    $('#time').text("Just now");
                    $('.toast-body').text("Product removed successfully");

                    //show toast
                    toast.show()
                }
            });
        });

        //add ajax request
        $('#addForm').on('submit', function(e) {
            e.preventDefault();

            var product = $('#product').val();
            var qty = $('#qty').val();
            var SN = $('#SN').val();

            var toast = new bootstrap.Toast(toast_element);

            $.ajax({
                url: '/inventory/add/<?= $id ?>',
                type: 'POST',
                data: {
                    product: product,
                    qty: qty,
                    SN: SN
                },
                success: function(data) {
                    //initialize toast
                    $('#title').text("Success");
                    $('#time').text("Just now");
                    $('.toast-body').text("Product added successfully");
                    toast.show();

                    //add table row
                    table.row.add([
                        product,
                        SN,
                        qty
                    ]).draw(false);

                    //unselect table row
                    table.$('tr.selected').removeClass('selected');
                    $('#edit').prop('disabled', true);
                    $('#rem').prop('disabled', true);

                    //clear form
                    $('#product').val('');
                    $('#qty').val('');
                    $('#SN').val('');

                    //close form
                    $('#closeAddButton').click();

                },
                error: function(data) {
                    console.log(data);
                    $('#title').text("Error");
                    $('#time').text("Just now");
                    $('.toast-body').text("Something went wrong");
                    toast.show();
                }
            });
        });

        $('#edit').click(function(e) {
            e.preventDefault();

            //take selected row and get data
            var product = $('.selected').find('td:first').text();
            var qty = $('.selected').find('td:nth-child(3)').text();
            var SN = $('.selected').find('td:nth-child(2)').text();

            //set product_edit value to selected row
            $('#product_edit').val(product);
            $('#qty_edit').val(qty);
            $('#SN_edit').val(SN);
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            //take the value of inputs in the form
            var product = $('#product_edit').val();
            var qty = $('#qty_edit').val();
            var SN = $('#SN_edit').val();

            var toast = new bootstrap.Toast(toast_element);

            $.ajax({
                url: '/inventory/edit/' + <?= $id ?>,
                type: 'POST',
                data: {
                    product: product,
                    qty: qty,
                    SN: SN
                },
                success: function(data) {
                    //update table row
                    table.row('.selected').data([
                        product,
                        SN,
                        qty
                    ]).draw(false);

                    //unselect table row
                    table.$('tr.selected').removeClass('selected');
                    $('#edit').prop('disabled', true);
                    $('#rem').prop('disabled', true);

                    //set fields
                    $('#title').text("Success");
                    $('#time').text("Just now");
                    $('.toast-body').text("Product edited successfully");
                    toast.show();

                    //hide edit modal
                    $('#editModal').modal('hide');

                }
            });
        });

    });
</script>

</html>