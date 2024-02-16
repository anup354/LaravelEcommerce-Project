{{-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Order Information</title>
</head>

<body style="">

    <div
        style="
        background-color: rgb(245, 255, 252);
        font-style: normal;
        padding: 10px;
        width: 100%;
        border-radius: 20px;
      ">
        <div style="
      font-style: 32px;
    ">

        </div>
        <div
            style="
          background-color: white;
          margin: 3rem auto;
          padding: 2rem;
          margin-top: 150;
          font-size: 1rem;
          border-radius: 20px;
        ">

            <h2>
                {{ $mailData['user_details']->billing_name }}  order products from  {{ $mailData['order_from'] }}
            </h2>
            <p style="margin-top: 20px;">
            <h2>
                Order Details
            </h2>
            <div
                style="display: flex; justify-content: space-between; border: 1px solid #000;border-radius: 0.5rem; padding: 10px;margin-top: 8px">
                <div style="flex: 1; border-right: 1px solid #000; padding-right: 10px;">
                    <h3 style="text-decoration: underline;">Shipping/Delivery Details</h3>
                    <h4 style="margin: 0;">Name: {{ $mailData['user_details']->shipping_name }}</h4>
                    <h4 style="margin: 0;">Email: {{ $mailData['user_details']->shipping_email }}</h4>
                    <h4 style="margin: 0;">Phone Number: {{ $mailData['user_details']->shipping_phonenumber }}</h4>
                </div>
                <div style="flex: 1; padding-left: 10px;">
                    <h3 style="text-decoration: underline;">Billing Details</h3>
                    <h4 style="margin: 0;">Name: {{ $mailData['user_details']->billing_name }}</h4>
                    <h4 style="margin: 0;">Email: {{ $mailData['user_details']->billing_email }}</h4>
                    <h4 style="margin: 0;">Phone Number: {{ $mailData['user_details']->billing_phonenumber }}</h4>
                </div>
            </div>
            <div style="flex: 1; border: 1px solid #000; border-radius: 0.5rem; padding: 0.5rem;margin-top: 8px">
                <h2 style="font-size: 1.25rem; font-weight: bold; font-size: 1.125rem;">Items</h2>
                <div style="display: flex; flex-direction: column;">

                    @foreach ($mailData['ordersWithItems'] as $order)
                        <div style="padding: 0.5rem;">
                            <div style="margin-top: 1rem; color: #5a5858; gap: 0.5rem;">

                                <p>Order ID: {{ $order->order_id }}</p>
                                <p>Total Order Items: {{ $order->items }}</p>
                                <p>Payment Method: {{ $order->payment_method }}</p>
                                <p>Grand Total: {{ $order->amount }}</p>

                                @foreach ($order->orderItem as $item)
                                    <div
                                        style="border: 1px solid #000; padding: 1rem; margin-top: 0.50rem; border-radius: 0.25rem; background-color: #fff;">

                                        <div
                                            style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 0.375rem;">
                                            <img src="{{ asset('uploads/' . $item->product->featured_image) }}"
                                                alt="product-image" style="height: 3rem; border-radius: 0.375rem;" />

                                            <div style="margin-left: 10px">
                                                <div style="text-decoration: underline; font-weight: bold;">
                                                    {{ $item->product->product_name }}</div>
                                                <div>Qty: {{ $item->quantity }}</div>
                                                Price: {{ $item->product_price }}
                                            </div>
                                        </div>
                                        <div style="display: flex; flex-wrap: wrap; gap: 3rem;">
                                            @foreach ($item->orderAttributes as $attribute)
                                                <div
                                                    style="border: 1px solid #4456a6;margin-left: 10px; background-color: #4456a6; color: #fff; padding: 0.125rem 0.25rem; border-radius: 0.25rem;">
                                                    {{ $attribute->getAttributename->attribute_name }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                Thank you.
            </div>

            </p>

        </div>

    </div>
</body>

</html> --}}

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Order Information</title>
</head>

<body style="">

    @foreach ($mailData['ordersWithItems'] as $order)
        <div
            style="margin-top: 1rem;  background-color: rgb(245, 255, 252); padding: 1.5rem; padding-left: 3rem; width: 100%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
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

            <div
                style="display: flex; justify-content: space-between; margin-top: 0.8rem; font-size: 0.875rem; color: #6b7280;">
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
                        style="width: 100%; font-size: 0.875rem; text-align: left; color: #5a5a5a; border-collapse: collapse;">
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
