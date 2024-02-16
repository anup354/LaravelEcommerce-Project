<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderbillinginfo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateInvoicePdf($orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            $user_details = Orderbillinginfo::where("order_id", $order->id)->first();
            $productdetails = Order::with(['orderItem', 'orderItem.orderAttributes'])
                ->where('id', $order->id)
                ->get();
            $pdfFileName = "invoice_{$order->order_id}.pdf";

            $pdf = Pdf::loadView('invoice.invoice', compact('order', 'user_details', 'productdetails'));
            return $pdf->download($pdfFileName);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to download PDF.'.$e);
        }
    }

}
