<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            word-wrap: break-word;
            font-size: 9px;
            /* Wrap long words */
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Sales Report</h1>
    <p>Generated on: {{ now() }}</p>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Payment Method</th>
                <th>Order Status</th>
                <th>Payment Status</th>
                <th>Order From</th>
                <th>Delivery Charge</th>
                <th>Tax Percent</th>
                <th>Tax Amount</th>
                <th>Order Date</th>
                <th>Delivered Date</th>
                <th>Coupon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderList as $order)
                <tr>
                    <td>{{ $order->order_id ?? '-' }}</td>
                    <td>{{ $order->amount ?? '-' }}</td>
                    <td>{{ $order->payment_method ?? '-' }}</td>
                    <td>{{ $order->order_status ?? '-' }}</td>
                    <td>{{ $order->payment_status ?? '-' }}</td>
                    <td>{{ $order->order_from ?? '-' }}</td>
                    <td>{{ $order->delivery_charge ?? '-' }}</td>
                    <td>{{ $order->taxpercent ?? '-' }}</td>
                    <td>{{ $order->taxamount ?? '-' }}</td>
                    <td>{{ $order->created_at ?? '-' }}</td>
                    <td>{{ $order->delivered_date ?? '-' }}</td>
                    <td>{{ $order->coupon ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
