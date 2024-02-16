<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Order Information</title>
</head>

<body>

    @foreach ($mailData['ordersWithItems'] as $order)
        <div
            style="margin-top: 1rem;  background-color: rgb(245, 255, 252); padding: 1.5rem; padding-left: 3rem; width: 100%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <div>
                <h3>Thank You for your Order!
                </h3>
                <p>
                    Your order {{ $order->order_id }} has been placed successfully and we will let you know once your
                    package
                    is on its way.
                </p>
            </div>
            <div style="margin-top: 0.5rem; margin-bottom: 2rem;">
                <ul style="list-style-type: none; padding: 0;">
                    <li style="font-weight: 600;">Order ID: <span
                            style="font-weight: normal;">{{ $order->order_id }}</span>
                    </li>
                    <li style="font-weight: 600;">Total Amount: <span
                            style="font-weight: normal;">{{ $order->amount }}</span>
                    </li>
                    <li style="font-weight: 600;">Payment Method: <span
                            style="font-weight: normal;">{{ $order->payment_method }}</span></li>
                    {{-- <li style="font-weight: 600;">Order Status: <span style="font-weight: normal;">
                            @if ($order->order_status == 'DELIVERED')
                                <span
                                    style="padding: 0.2rem 0.5rem; border-radius: 0.2rem; font-size: 0.50rem; background-color: #34d399; color: #fff;">{{ $order->order_status }}</span>
                            @elseif ($order->order_status == 'CANCELED')
                                <span
                                    style="padding: 0.2rem 0.5rem; border-radius: 0.2rem; font-size: 0.50rem; background-color: #ef4444; color: #fff;">{{ $order->order_status }}</span>
                            @elseif ($order->order_status == 'PROCESSING')
                                <span
                                    style="padding: 0.2rem 0.5rem; border-radius: 0.2rem; font-size: 0.50rem; background-color: #f59e0b; color: #fff;">{{ $order->order_status }}</span>
                            @elseif ($order->order_status == 'SHIPPED')
                                <span
                                    style="padding: 0.2rem 0.5rem; border-radius: 0.2rem; font-size: 0.50rem; background-color: #14b8a6; color: #fff;">{{ $order->order_status }}</span>
                            @elseif ($order->order_status == 'VERIFIED')
                                <span
                                    style="padding: 0.2rem 0.5rem; border-radius: 0.2rem; font-size: 0.50rem; background-color: #3b82f6; color: #fff;">{{ $order->order_status }}</span>
                            @elseif ($order->order_status == 'RETURNED')
                                <span
                                    style="padding: 0.2rem 0.5rem; border-radius: 0.2rem; font-size: 0.50rem; background-color: #f59e0b; color: #fff;">{{ $order->order_status }}</span>
                            @endif
                        </span>
                    </li> --}}
                </ul>
            </div>

            <div style="margin-top: 0.8rem; font-size: 0.875rem; color: #6b7280;">
                <ul style="list-style-type: none; padding: 0;">
                    <li style="font-size: 1.125rem; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Billing
                        Address
                    </li>
                    <li style="font-weight: 600; color: #000;">Name: {{ $mailData['user_details']->billing_name }}</li>
                    <li>Phone: {{ $mailData['user_details']->billing_phonenumber }}</li>
                    <li>Address: {{ $mailData['user_details']->billing_address }}</li>
                    <li>Email: {{ $mailData['user_details']->billing_email }}</li>
                </ul>
                <ul style="list-style-type: none; padding: 0;">
                    <li style="font-size: 1.125rem; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Shipping
                        Address
                    </li>
                    <li style="font-weight: 600; color: #000;">Name: {{ $mailData['user_details']->shipping_name }}
                    </li>
                    <li>Phone: {{ $mailData['user_details']->shipping_phonenumber }}</li>
                    <li>Address: {{ $mailData['user_details']->shipping_address }}</li>
                    <li>Email:{{ $mailData['user_details']->shipping_email }}</li>
                </ul>
            </div>

            <div style="margin-top: 0.8rem; border: 1px solid #e5e7eb; ">
                <div style="position: relative; overflow-x: auto;">
                    <table
                        style="width: 100%; font-size: 0.875rem; text-align: left; color: #5a5a5a; border-collapse: collapse; ">
                        <thead
                            style="font-size: 0.50rem; text-transform: uppercase; color: #4b5563; background-color: #f9fafb;">
                            <tr>
                                <th style="padding: 0.5rem;">Product name</th>
                                <th style="padding: 0.5rem;">Attributes</th>
                                <th style="padding: 0.5rem;">Price</th>
                                <th style="padding: 0.5rem;">Qty</th>
                                <th style="padding: 0.5rem;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItem as $item)
                                <tr style="background-color: #fff; border-bottom: 1px solid #e5e7eb;">
                                    <th style="padding: 0.5rem; font-weight: 600; color: #000; white-space: nowrap;">
                                        {{ $item->product->product_name }}</th>
                                    <td style="padding: 0.5rem;">
                                        @foreach ($item->orderAttributes as $attribute)
                                            {{ $attribute->getAttributename->attribute_name . ',' }}
                                        @endforeach
                                    </td>
                                    <td style="padding: 0.5rem;">{{ $item->product_price }}</td>
                                    <td style="padding: 0.5rem;">{{ $item->quantity }}</td>
                                    <td style="padding: 0.5rem;">{{ $item->quantity * $item->product_price }}</td>
                                </tr>
                            @endforeach
                            <tr style="background-color: #fff; border-bottom: 1px solid #e5e7eb;">
                                <td colspan="4" style="padding: 0.5rem; text-align: right; font-weight: 600;">
                                    Delivery
                                    Charge:</td>
                                <td style="padding: 0.5rem;">{{ $order->delivery_charge }}</td>
                            </tr>
                            <tr style="background-color: #fff; border-bottom: 1px solid #e5e7eb;">
                                <td colspan="4" style="padding: 0.5rem; text-align: right; font-weight: 600;">Tax
                                    ({{ $order->taxpercent }}%):</td>
                                <td style="padding: 0.5rem;">{{ $order->taxamount }}</td>
                            </tr>
                            @if ($order->coupondiscount)
                                @php
                                    $coupon = getCoupon($order->coupon);
                                    // dd($coupon->discount_amount)
                                @endphp
                                <tr style="background-color: #fff; border-bottom: 1px solid #e5e7eb;">
                                    <td colspan="4" style="padding: 0.5rem; text-align: right; font-weight: 600;">
                                        Coupon ({{ $coupon->discount_amount }}%):
                                    </td>
                                    <td style="padding: 0.5rem;">
                                        - {{ $order->coupondiscount }}
                                    </td>
                                </tr>
                            @endif
                            <tr style="background-color: #fff; border-bottom: 1px solid #e5e7eb;">
                                <td colspan="4" style="padding: 0.5rem; text-align: right; font-weight: 700;">Grand
                                    Total:
                                </td>
                                <td style="padding: 0.5rem;">{{ $order->amount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

</body>

</html>
