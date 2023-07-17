<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $fileName ?? date()->format('d') }}</title>
    <style>
                  html{
            margin-left: 22px;
            margin-right: 22px;
            margin-top: 28px;
            margin-bottom: 28px;
        }
        *,::before,::after{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body{
            font-size: 12px;
            font-weight: 400;
            color: #212529;
        }
        body, html {
            font-family: sans-serif;
        }
        table {
            width: 100%;
        }
        /* table {
            display: table;
            border-collapse: collapse;
            border-color: grey;
        } */

        .th {
            font-size: 14px;
            color: #fff;
            line-height: 1.4;
            background-color: #6c7ae0; /*#6c7ae0 */
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .head{
            /* padding-top: 12px;
            padding-bottom: 12px; */
        }
        .center{
            text-align: center;
        }
        p{
            margin-top: 0;
            margin-bottom: 0;
        }
        ul{
            list-style-type: none;
        }
        .tablepe > tr:nth-child(even) {
            background-color: #f8f6ff;
        }
        .tablepe{
            /* border: 1px solid black;*/
            border-collapse: collapse;
        }
        .body > th{
        /*  border: 1px solid rgb(49, 49, 49);*/
            border: 1px solid rgb(29, 29, 29); /*#6c7ae0*/
        }
        .body > td{
            border: 1px solid rgb(29, 29, 29);
        }

    </style>
</head>
<body>
<div class="container">

    <table style="padding-bottom: 12px; padding-top: 10px;">
                <thead>
                    <tr>
                        <th align="left">Una Puno</th>
                        <th align="center">Reporte</th>
                        <th align="right" >10/06/2</th>
                    </tr>
                </thead>
    </table>
    <table class="tablepe">
        <tr class="body">
            @foreach ($columns as $column)
                <th class="center th" width="auto">
                    {{ $column->getLabel() }}
                </th>
            @endforeach
        </tr>
        @foreach ($rows as $row)
            <tr class="body">
                @foreach ($columns as $column)
                    <td class="center">
                        {{ $row[$column->getName()] }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
    </div>

</body>
</html>
