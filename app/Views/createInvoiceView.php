<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="typeaheadjs.css" rel="stylesheet">
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

        button {
            padding: 10px 10;
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background: #8ebf42;
            color: #fff;
        }

        button:hover {
            background: #808080;
        }

        .container {
            width: 50%;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 10px;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="/public/">Faturat Aktive</a></li>
        <li><a class="active" style="cursor: pointer;">Krijo Fature</a></li>
        <li><a href="/public/archivedView/">Arkiva</a></li>
    </ul> </br>
    <div>
        <h1>Krijo Fature</h1> </br>
        <form action="createInvoice" method="post" style="margin: auto; text-align: center;">
            <div>
                <div class="container">
                    <div> <input type="text" name="First_Name" placeholder="Emer"> </input> </div> </br>
                    <div> <input type="text" name="Last_Name" placeholder="Mbiemer"> </input> </div> </br>
                    <div> <input type="text" name="Contact" placeholder="Kontakt"> </input> </div> </br>
                    <div> <input type="text" name="Operator" placeholder="Operator"> </input> </div> </br>
                    <div> <input type="text" name="Device" placeholder="Paisja"></input> </div> </br>
                    <div> <input type="number" name="Qty" placeholder="Sasia"> </input> </div> </br>
                    <div> <textarea type="text" name="Comments" placeholder="Komente" style="resize: none;" rows="4" cols="38"></textarea> </div>
                </div>
                <button class="button_text" type="submit" name="submit_button">Krijo</button>
            </div>
        </form>
    </div>
    <script src="node_modules\jquery\dist\jquery.js" type="text/javascript"></script>
</body>

</html>