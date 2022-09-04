<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .report-table table {
            width: 100%;
            font-size: 14px;
            font-family: 'Roboto', sans-serif;
        }

        .report-table table,
        .report-table table th,
        .report-table table td,
        .report-table table tr {
            border: 1px solid #eaeaea;
            border-collapse: collapse;
            text-align: center;
        }

        .report-table h5 {
            background-color: #000;
            margin-bottom: 30px;
            color: #ffffff;
            text-align: center;
            font-size: 14px;
            padding: 5px;
            font-family: 'Roboto', sans-serif;
        }

        thead {
            background-color: #000;
            color: #fff;
        }

        thead th {
            padding: 5px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #eaeaea;
        }
    </style>
</head>
<body>
    <div class="report-table">
        <h5>Search Result for <strong>{{ $company->company_name }}({{ $company->symbol }})</strong> : in date range From {{$start_date}} to {{$end_date}} </h5>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Open</th>
                    <th>High</th>
                    <th>Low</th>
                    <th>Close</th>
                    <th>Volume</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                    <tr>
                        <td>{{ $price['date'] }}</td>
                        <td>{{ $price['open'] }}</td>
                        <td>{{ $price['high'] }}</td>
                        <td>{{ $price['low'] }}</td>
                        <td>{{ $price['close'] }}</td>
                        <td>{{ $price['volume'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
