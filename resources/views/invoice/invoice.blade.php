<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .flex-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .flex-row {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: space-between;
        }

        .straight {
            display: flex;
            align-items: center;
        }
    </style>
    <title>Invoice</title>
</head>

<body>

    <div class="flex-container" style="margin-top: 10px; background-color: #fff; padding: 15px;">
        <img src="images/logo.png" alt="Company Logo" style="width: 80px; height: auto; margin-bottom: 20px;">

        <div style="font-size: 20px; color: #2d3748; margin-bottom: 10px;">Billing Address</div>

        <div class="flex-row">
            <div class="straight" style="color: #4a5568; flex-basis: 100%;">
                <div style="font-weight: bold; margin-bottom: 5px;">Name:</div>
                <div>{{ $user_details->billing_name }}</div>
            </div>
            <div class="straight" style="color: #4a5568; flex-basis: 100%;">
                <div style="font-weight: bold; margin-bottom: 5px;">Phone:</div>
                <div>{{ $user_details->billing_phonenumber }}</div>
            </div>
            <div class="straight" style="color: #4a5568; flex-basis: 100%;">
                <div style="font-weight: bold; margin-bottom: 5px;">Address:</div>
                <div>{{ $user_details->billing_address }}</div>
            </div>
            <div class="straight" style="color: #4a5568; flex-basis: 100%;">
                <div style="font-weight: bold; margin-bottom: 5px;">Email:</div>
                <div>{{ $user_details->billing_email }}</div>
            </div>
        </div>

        <div class="flex-row" style="margin-top: 10px; font-size: 14px;">
            <div class="straight" style="color: #4a5568; flex-basis: 100%;">
                <div style="font-weight: bold; margin-bottom: 5px;">Order ID:</div>
                <div style="font-weight: normal;">{{ $order->order_id }}</div>
            </div>
            <div class="straight" style="color: #4a5568; flex-basis: 100%;">
                <div style="font-weight: bold; margin-bottom: 5px;">Total Amount:</div>
                <div style="font-weight: normal;">{{ $order->amount }}</div>
            </div>
            <div class="straight" style="color: #4a5568; flex-basis: 100%;">
                <div style="font-weight: bold; margin-bottom: 5px;">Order Status:</div>
                <div style="font-weight: normal;">
                    @if ($order->order_status == 'DELIVERED')
                        <div
                            style="padding: 0.5rem 1rem; border-radius: 0.25rem; background-color: #48BB78; color: #fff; font-size: 0.75rem; display: inline-block;">
                            {{ $order->order_status }}
                        </div>
                    @elseif ($order->order_status == 'CANCELED')
                        <div
                            style="padding: 0.5rem 1rem; border-radius: 0.25rem; background-color: #F56565; color: #fff; font-size: 0.75rem; display: inline-block;">
                            {{ $order->order_status }}
                        </div>
                    @elseif ($order->order_status == 'PROCESSING')
                        <div
                            style="padding: 0.5rem 1rem; border-radius: 0.25rem; background-color: #ED8936; color: #fff; font-size: 0.75rem; display: inline-block;">
                            {{ $order->order_status }}
                        </div>
                    @elseif ($order->order_status == 'SHIPPED')
                        <div
                            style="padding: 0.5rem 1rem; border-radius: 0.25rem; background-color: #38B2AC; color: #fff; font-size: 0.75rem; display: inline-block;">
                            {{ $order->order_status }}
                        </div>
                    @elseif ($order->order_status == 'VERIFIED')
                        <div
                            style="padding: 0.5rem 1rem; border-radius: 0.25rem; background-color: #4299E1; color: #fff; font-size: 0.75rem; display: inline-block;">
                            {{ $order->order_status }}
                        </div>
                    @elseif ($order->order_status == 'RETURNED')
                        <div
                            style="padding: 0.5rem 1rem; border-radius: 0.25rem; background-color: #D69E2E; color: #fff; font-size: 0.75rem; display: inline-block;">
                            {{ $order->order_status }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div style="margin-top: 10px; border: 1px solid #CBD5E0; overflow-x: auto; font-size: 12px;">
            <table style="width: 100%; font-size: 14px; border-collapse: collapse;" border="1" cellspacing="0">
                <thead
                    style="text-align: left; background-color: #d7dce1; color: #000; border-bottom: 2px solid #cbd5e0; font-size: 12px;">
                    <tr>
                        <th style="padding: 15px; font-weight: bold;">Product name</th>
                        <th style="padding: 15px; font-weight: bold;">Attributes</th>
                        <th style="padding: 15px; font-weight: bold;">Price</th>
                        <th style="padding: 15px; font-weight: bold;">Qty</th>
                        <th style="padding: 15px; font-weight: bold;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItem as $item)
                        <tr style="background-color: #fff; border-bottom: 1px solid #cbd5e0;">
                            <td style="padding: 15px; font-weight: 600;">{{ $item->product->product_name }}</td>
                            <td style="padding: 15px;">
                                @foreach ($item->orderAttributes as $attribute)
                                    {{ $attribute->getAttributename->attribute_name }}<br>
                                @endforeach
                            </td>
                            <td style="padding: 15px;">{{ $item->product_price }}</td>
                            <td style="padding: 15px;">{{ $item->quantity }}</td>
                            <td style="padding: 15px;">{{ $item->quantity * $item->product_price }}</td>
                        </tr>
                    @endforeach
                    <tr style="background-color: #fff; border-bottom: 1px solid #cbd5e0;">
                        <td colspan="4" style="padding: 15px; text-align: right; font-weight: bold;">Delivery Charge:
                        </td>
                        <td style="padding: 15px;">{{ $order->delivery_charge }}</td>
                    </tr>
                    <tr style="background-color: #fff; border-bottom: 1px solid #cbd5e0;">
                        <td colspan="4" style="padding: 15px; text-align: right; font-weight: bold;">Tax
                            ({{ $order->taxpercent }}%):</td>
                        <td style="padding: 15px;">{{ $order->taxamount }}</td>
                    </tr>
                    <tr style="background-color: #fff; border-bottom: 1px solid #cbd5e0;">
                        <td colspan="4" style="padding: 15px; text-align: right; font-weight: bold;">Grand Total:
                        </td>
                        <td style="padding: 15px;">{{ $order->amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
