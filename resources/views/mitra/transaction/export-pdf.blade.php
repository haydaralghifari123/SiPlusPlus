<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Transaction Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Mitra Transaction Report (Paid) for {{ auth()->user()->name }}</h1>
    <p>Report generated on: {{ now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Invoice Number</th>
                <th>Buyer Name</th>
                <th>Course Name</th>
                <th>Total Pay</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->invoice_number }}</td>
                <td>{{ $transaction->user->name ?? 'N/A' }}</td>
                <td>{{ $transaction->course->name ?? 'N/A' }}</td>
                <td>Rp {{ number_format($transaction->total_pay, 0, ',', '.') }}</td>
                <td>Paid</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <p>Total Paid Transactions: {{ $totalTransactions }}</p>
    </div>
</body>
</html>
