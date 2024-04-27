<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    .kot-box {
        border: 2px solid;
        padding: 10px;
        width: 500px;
        margin: auto;
    }

    * {
        font-family: 'Roboto', sans-serif;
    }

    .kot-heading {
        width: 100%;
        padding: 10px 0;
    }

    .kot-heading tr td {
        border-left: none;
        border-right: none;
        vertical-align: top;
        font-size: 13px;
        padding: 5px
    }

    .kot-items {
        width: 100%;
    }

    .kot-items tr th {
        font-size: 13px;
        letter-spacing: 1px;
        padding: 5px;
        text-align: center;
    }

    .kot-items tr:nth-child(1) {
        background-color: #d0d0d0;
    }

    .kot-items tr td {
        text-align: center;
        font-size: 13px;
    }

    .kot-items tr td {
        border-right: 1px solid;
    }

    .kot-items tr td:last-child {
        border: none
    }

    .kot-items {
        border: 1px solid;
    }

    .kot-des {
        padding: 10px 0;
    }

    .kot-des tr td {
        font-size: 13px;
    }
</style>

<body>
    <div class="kot-box">
        <table style="width:100%" cellspacing="0">
            <tr>
                <td style="width:100%">
                    <div style="display: flex;justify-content: center;width:100%">
                        <img src="{{ public_path() }}/tempPdf/logo.png" height="50">
                    </div>
                </td>
            </tr>
        </table>
        <table class="kot-heading" cellspacing="0">
            <tr>
                <th colspan="3" style="text-align: center;padding:10px 0">Kitchen Order Ticketing ( KOT )</th>
            </tr>
            <tr>
                <td style="text-align: start;"><b>Dated : </b>{{ date('d-M-Y, g:i A') }}</td>
                <td style="text-align:right"><b>Table :
                    </b>{{ implode(', ', $tables) }}
                </td>
            </tr>
        </table>
        <table class="kot-items" cellspacing="0">
            <tr>
                <th>SR.NO.</th>
                <th>ITEM</th>
                <th>UNIT</th>
                <th>QUANTITY</th>
            </tr>
            @foreach ($productData as $key => $product)
                <tr>
                    <td><b> {{ $key + 1 }}</b></td>
                    <td>{{ getProductName($product['product_id']) }}</td>
                    <td>{{ $product['product_unit'] }}</td>
                    <td>{{ $product['product_qty'] }}</td>
                </tr>
            @endforeach
        </table>
        <table cellspacing="0" class="kot-des">
            <tr>
                <td><b>Description</b></td>
            </tr>
            <tr>
                <td>{{ $orderInstruction }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
