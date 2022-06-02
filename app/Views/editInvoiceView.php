<html>

<body>
    <ul class="ul">
        <li class="li"><a class="a" href="/">Faturat Aktive</a></li>
        <li class="li"><a class="a" href="/create/">Krijo Fature</a></li>
        <li class="li"><a class="a" href="/archivedView/">Arkiva</a></li>
        <li class="li"><a class="a" href="/inventory">Inventory</a></li>
    </ul>
    <h1> Edito Fature </h1>
    <?php foreach ($data->getResult() as $key) { ?>
        <form action="/editInvoice/<?= $key->ID ?>" method="post">
            <div class="container mx-auto border border-secondary rounded px-4 bg-light">

                <div class="form-group pt-3">
                    <div class="row">

                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Emri</span>
                                </div>
                                <input type='text' name='First_Name' class="form-control" placeholder='<?= $key->First_Name ?>'> </input>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Mbiemri</span>
                                </div>
                                <input type='text' name='Last_Name' class="form-control" placeholder='<?= $key->Last_Name ?>'> </input>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Kontakt</span>
                                </div>
                                <input type='text' name='Contact' class="form-control" placeholder='<?= $key->Contact ?>' value='<?= $key->Contact ?>'> </input>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col-auto">
                            <label for="Device">Paisja:</label>
                            <input type='text' name='Device' class="form-control" placeholder='<?= $key->Device ?>' value='<?= $key->Device ?>'> </input>
                        </div>

                        <div class="col-auto">
                            <label for="Qty">Sasia:</label>
                            <input type='number' name='Qty' class="form-control" placeholder='<?= $key->Qty ?>' value='<?= $key->Qty ?>'> </input>
                        </div>

                        <div class="col-auto">
                            <label for="Qty">Cmimi:</label>
                            <input type='number' name='Price' class="form-control" placeholder='<?= $key->Price ?>' value='<?= $key->Price ?>'> </input>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col-auto">
                            <label for="Status_Repaired">Statusi i riparimit:</label>
                            <select id='Status_Repaired' name='Status_Repaired' class="custom-select">
                                <option value='0'> Pa riparuar </option>
                                <option value='1'> Riparuar </option>
                            </select>
                        </div>
                        <script>
                            document.getElementById("Status_Repaired").selectedIndex = '<?= $key->Status_Repaired ?>';
                        </script>

                        <div class="col-auto">
                            <label for="Status_Paid">Statusi i pagimit:</label>
                            <select id='Status_Paid' name='Status_Paid' class="custom-select">
                                <option value='0'> Pa Paguar </option>
                                <option value='1'> Paguar </option>
                            </select>
                        </div>
                        <script>
                            document.getElementById("Status_Paid").selectedIndex = '<?= $key->Status_Paid ?>';
                        </script>

                        <div class="col-auto">
                            <label for="Status_Dispatched">Statusi i dorezimit:</label>
                            <select id='Status_Dispatched' name='Status_Dispatched' class="custom-select">
                                <option value='0'> Pa Dorezuar </option>
                                <option value='1'> Dorezuar </option>
                            </select>
                        </div>
                        <script>
                            document.getElementById("Status_Dispatched").selectedIndex = '<?= $key->Status_Dispatched ?>';
                        </script>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-auto">
                            <label for="Operator_Dispatch">Dorezuesi:</label>
                            <input type='text' name='Operator_Dispatch' class="form-control" placeholder='<?= $key->Operator_Dispatch ?>' value='<?= $key->Operator_Dispatch ?>'> </input>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Komente</span>
                    </div>
                    <textarea type='text' name='Comments' class="form-control" placeholder='<?= $key->Comments ?>' value='<?= $key->Comments ?>'> </textarea>
                </div>

                <div class="btn- mb-3" role="toolbar">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type='submit' class="btn btn-success" id="submit_button" value="<?= $key->ID ?>">Save</button>
                    </div>

                    <div class="btn-group mr-2" role="group">
                        <a href="/"><button type='button' class="btn btn-danger">Cancel</button></a>
                    </div>
                </div>

            </div>
        <?php } ?>
        </form>
</body>

</html>