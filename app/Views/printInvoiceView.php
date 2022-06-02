<html>

<body onload="window.print(); window.close();">
    <div class="row px-5">
        <?php foreach ($data->getResult() as $key) { ?>
            <div class="col">

                <p>Emri: <?php echo $key->First_Name . " " . $key->Last_Name ?></p>
                <p>Kontakt: <?php echo $key->Contact ?></p>
                <p>Paisja: <?php echo $key->Device . " x " . $key->Qty ?> </p>
                <p>Komente: <?php echo $key->Comments ?> </p>
                <p>Marresi: <?php echo $key->Operator ?> </p>
                <p>Data: <?php echo $key->Date_Entry ?> </p>

            </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A<?php echo $key->BARCODE ?>&choe=UTF-8" />
        </div>
    <?php } ?>
    </div>
</body>

</html>