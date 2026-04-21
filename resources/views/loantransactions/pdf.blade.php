<!DOCTYPE html>
<html>
<head>
    <title>Transactions PDF</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Loan Transactions Report</h2>
    <table>
        <tr>
            <th>Customer</th>
            <th>Loan</th>
            <th>Amount Paid</th>
            <th>Date Paid</th>
        </tr>
        @foreach($transactions as $t)
        <tr>
            <td>{{ $t->customer->name }}</td>
            <td>{{ $t->loan->description }}</td>
            <td>{{ $t->amount_paid }}</td>
            <td>{{ $t->date_paid }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
