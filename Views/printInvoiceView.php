<html>

<style>
    .rotate {
        transform: rotate(-90deg);
    }
</style>

<body onload="window.print(); window.close();">
    <div class="row">
        <?php foreach ($data->getResult() as $key) { ?>

            <div class="col col-md-auto">
                <img src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=http%3A<?php echo $key->BARCODE ?>&choe=UTF-8" />
            </div>
            <!-- 
            <div class="col col-md-auto py-5 rotate">

                <h1>Emri: <?php echo $key->First_Name . " " . $key->Last_Name ?></h1>
                <h1>Kontakt: <?php echo $key->Contact ?></h1>

            </div>
            -->
        <?php } ?>
    </div>
</body>

</html>