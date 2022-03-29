<html>

<head>
    <script src="\public\node_modules\jquery\dist\jquery.js" type="text/javascript"></script>

    <script type="text/javascript" src="\public\bootstrap3-typeahead.js"></script>
    <link href="\public\bootstrap.css" rel="stylesheet">
    <link href="\public\typeaheadjs.css" rel="stylesheet">

    <script type="text/javascript" src="\public\node_modules\datatables.net\js\jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: sticky;
            top: 0;
            width: 100%;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }

        input[type=text],
        select {
            width: 70%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        button {
            width: 7%;
            height: 5%;
            padding: 10px 0;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: #8ebf42;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        button:hover {
            background: #82b534;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            text-align: left;
            padding: 8px;
        }

        th {
            text-align: right;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="/public/">Faturat Aktive</a></li>
        <li><a href="/public/create/">Krijo Fature</a></li>
        <li><a href="/public/archivedView/">Arkiva</a></li>
    </ul>
    <h1> Edito Fature </h1>
    <?php foreach ($data->getResult() as $key) { ?>
        <form action="/public/editInvoice/<?= $key->ID ?>" method="post" style="margin: auto; text-align: center;">
            <table>
                <tr>
                    <th>Emri:</th>
                    <td> <input type='text' name='First_Name' placeholder='<?= $key->First_Name ?>' value = <?= $key->First_Name ?> </input> </td>
                </tr>
                <tr>
                    <th>Mbiemri:</th>
                    <td> <input type='text' name='Last_Name' placeholder='<?= $key->Last_Name ?>' value = '<?= $key->Last_Name ?>'> </input> </td>
                </tr>
                <tr>
                    <th>Kontakt:</th>
                    <td> <input type='text' name='Contact' placeholder='<?= $key->Contact ?>' value='<?= $key->Contact ?>'> </input>
                </tr>
                <tr>
                    <th>Marresi:</td>
                    <td> <input type='text' name='Device' placeholder='<?= $key->Device ?>' value='<?= $key->Device ?>'></input> </td>
                </tr>
                <tr>
                    <th>Sasia:</th>
                    <td> <input type='number' name='Qty' placeholder='<?= $key->Qty ?>' value='<?= $key->Qty ?>'></input> </td>
                </tr>
                <tr>
                    <th> <label for='Status_Repaired'>Statusi i riparimit:</label></th>
                    <td> <select id='Status_Repaired' name='Status_Repaired'>
                            <option value='0'> Pa riparuar </option>
                            <option value='1'> Riparuar </option>
                        </select> </td>
                    <script>
                        document.getElementById("Status_Repaired").selectedIndex = '<?= $key->Status_Repaired ?>';
                    </script>
                </tr>
                <tr>
                    <th>Cmimi:</th>
                    <td> <input type='number' name='Price' placeholder='<?= $key->Price ?>' value='<?= $key->Price ?>'></input> </td>
                </tr>
                <tr>
                    <th> <label for='Status_Paid'>Statusi i pagimit:</label> </th>
                    <td> <select id='Status_Paid' name='Status_Paid'>
                            <option value='0'> Pa Paguar </option>
                            <option value='1'> Paguar </option>
                        </select> </td>
                    <script>
                        document.getElementById("Status_Paid").selectedIndex = '<?= $key->Status_Paid ?>';
                    </script>
                </tr>
                <tr>
                    <th><label for='Status_Dispatched'>Statusi i dorezimit:</label></th>
                    <td><select id='Status_Dispatched' name='Status_Dispatched'>
                            <option value='0'> Pa Dorezuar </option>
                            <option value='1'> Dorezuar </option>
                        </select></td>
                    <script>
                        document.getElementById("Status_Dispatched").selectedIndex = '<?= $key->Status_Dispatched ?>';
                    </script>
                </tr>
                <tr>
                    <th> Dorezuesi: </th>
                    <td> <input type='text' name='Operator_Dispatch' placeholder='<?= $key->Operator_Dispatch ?>' value='<?= $key->Operator_Dispatch ?>'></input> </td>
                </tr>
                <tr>
                    <th> Komente: </th>
                    <td> <input type='text' name='Comments' placeholder='<?= $key->Comments ?>' value='<?= $key->Comments ?>' style='resize: none;' rows='4' cols='38'></input> </td>
                </tr>
            </table>
            <button type='submit' id="submit_button" value="<?= $key->ID ?>">Save</button>
        <?php } ?>
        </form>

</body>

</html>