<html>

<head>
    <link href="/public/bootstrap.css" rel="stylesheet">
    <link href="/public/typeaheadjs.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
</head>

<body onload="window.print(); window.close();">
    <?php
    // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();

    foreach ($data->getResult() as $key) {
        echo "<head> <h1>" . $key->First_Name . " " . $key->Last_Name . "</h1> </head>";
        echo "<body> <p>Data: " . $key->Date_Entry . "</p>";
        // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($key->BARCODE, $generator::TYPE_CODE_128)) . '" width="500" height="100"> </br></br>';
        echo '<td> <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http%3A'.$key->BARCODE.'&choe=UTF-8" /> </td>';
        echo "<p>Kontakt:" . $key->Contact . "</p>";
        echo "<p>Marresi: " . $key->Operator . "</p>";
        echo "<p>Paisja: " . $key->Device . " x " . $key->Qty . "</p>";
        echo "<p>Komente: " . $key->Comments . "</p> </body>";
    }
    ?>
    <div>
        <label for="status">Riparuar</label>
        <input type="checkbox" id="status">
    </div> </br>

    <h3>Cmimi:</h3>
</body>

</html>