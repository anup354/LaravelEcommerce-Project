<?php

namespace App\Exports;

use App\Models\CustomerRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesReportExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        return $this->orders;
    }

    public function headings(): array
    {
        return [
            'Order ID',
            // 'Customer Name',
            'Total Amount',
            'Payment Method',
            'Order Status',
            'Payment Status',
            'Order From',
            'Deliver Charge',
            'Tax Percent',
            'Tax Amount',
            'Order Date',
            'Delivered Date',
            'Coupon',

        ];
    }

    public function map($order): array
    {
        $customerName = optional(CustomerRegistration::find($order->user_id))->name ?? '';

        return [
            'Order ID' => $order->order_id,
            // 'Customer Name' => $customerName,
            'Total Amount' => $order->amount,
            'Payment Method' => $order->payment_method,
            'Order Status' => $order->order_status,
            'Payment Status' => $order->payment_status,
            'Order From' => $order->order_from,
            'Deliver Charge' => $order->delivery_charge,
            'Tax Percent' => $order->taxpercent,
            'Tax Amount' => $order->taxamount,
            'Order Date' => $order->created_at,
            'Delivered Date' => $order->delivered_date,
            'Coupon' => $order->coupon,
        ];
    }

}
