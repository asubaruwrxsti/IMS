<html>

<body>
    <ul class="ul">
        <li class="li"><a class="a" href="/">Faturat Aktive</a></li>
        <li class="li"><a class="active a" href="/create/">Krijo Fature</a></li>
        <li class="li"><a class="a" href="/archivedView/">Arkiva</a></li>
        <li class="li"><a class="a" href="/inventory">Inventory</a></li>
    </ul>
    <h1> Krijo Fature </h1>

    <form action="/createInvoice" method="post">
        <div class="container mx-auto border border-secondary rounded px-4 bg-light">

            <div class="form-group pt-3">
                <div class="row">

                    <div class="col-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Emri</span>
                            </div>
                            <input type='text' name='First_Name' class="form-control">
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Mbiemri</span>
                            </div>
                            <input type='text' name='Last_Name' class="form-control">
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Kontakt</span>
                            </div>
                            <input type='text' name='Contact' class="form-control">
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-auto">
                        <label for="Device">Paisja:</label>
                        <input type='text' name='Device' class="form-control">
                    </div>

                    <div class="col-auto">
                        <label for="Qty">Sasia:</label>
                        <input type='number' name='Qty' class="form-control">
                    </div>

                    <div class="col-auto">
                        <label for="Operator">Marresi:</label>
                        <input type='text' name='Operator' class="form-control">
                    </div>

                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Komente</span>
                </div>
                <textarea type='text' name='Comments' class="form-control"> </textarea>
            </div>

            <div class="btn- mb-3" role="toolbar">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type='submit' class="btn btn-success" id="submit_button">Save</button>
                </div>

                <div class="btn-group mr-2" role="group">
                    <a href="/"><button type='button' class="btn btn-danger">Cancel</button></a>
                </div>
            </div>

        </div>
    </form>
</body>

</html>