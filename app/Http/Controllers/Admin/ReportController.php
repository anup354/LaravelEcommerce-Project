<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SalesReportExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderbillinginfo;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function salesreport()
    {
        // dd("salesreport");
        // $data = Product::latest()->paginate(5);
        $fromdate = "";
        $todate = "";
        $order_list = Order::where("order_status", "DELIVERED")->paginate(5);
        $home = 0;
        $totalprice = "";
        return view("admin.Report.salesreport", compact("order_list", "totalprice", "home", "fromdate", "todate"));
    }

    public function searchsales(Request $request)
    {

        $fromdate = $request->input("from");
        $todate = $request->input("to");

        $order_list = Order::where("order_status", "DELIVERED")
            ->whereBetween("created_at", [$fromdate, $todate])
            ->get();

        $totalprice = Order::where("order_status", "DELIVERED")
            ->whereBetween("created_at", [$fromdate, $todate])
            ->sum("amount");
        $home = 1;

        return view("admin.Report.salesreport", compact("order_list", "home", "totalprice", "fromdate", "todate"));
    }

    /**
     * Generate CSV report for sales.
     */
    public function exportSalesReportCsv(Request $request)
    {
        try {
            $fromDate = $request->input("from");
            $toDate = $request->input("to");

            $orderList = Order::select([
                'order_id',
                'amount',
                'payment_method',
                'order_status',
                'payment_status',
                'order_from',
                'delivery_charge',
                'taxpercent',
                'taxamount',
                'created_at',
                'delivered_date',
                'coupon',
            ])
                ->where("order_status", "DELIVERED")
                ->whereBetween("created_at", [$fromDate, $toDate])
                ->get();

            $csvFileName = "sales_report_{$fromDate}_to_{$toDate}.csv";

            return Excel::download(new SalesReportExport($orderList), $csvFileName);
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return redirect()->back()->with('error', 'Failed to download CSV.');
        }
    }

    /**
     * Generate PDF report for sales.
     */
    public function exportSalesReportPdf(Request $request)
    {
        try {
            $fromDate = $request->input("from");
            $toDate = $request->input("to");

            $orderList = Order::where("order_status", "DELIVERED")
                ->whereBetween("created_at", [$fromDate, $toDate])
                ->get();

            $pdfFileName = "sales_report_{$fromDate}_to_{$toDate}.pdf";

            $pdf = PDF::loadView('pdf.salesreport_pdf', compact('orderList'));
            return $pdf->download($pdfFileName);

        } catch (\Exception $e) {
            // Log or handle the exception as needed
            return redirect()->back()->with('error', 'Failed to download PDF.');
        }
    }

    public function invoice($orderid)
    {
        $order = Order::where("order_id", $orderid)->first();

        $productdetails = Order::with(['orderItem', 'orderItem.orderAttributes'])
            ->where('id', $order->id)
            ->get();
        // dd($productDetails);

        // $user_details = Orderbillinginfo::where('order_id', $order->id)->first();
        // $orderitems = Orderitem::where("order_id", $order->id)->get();
        $billinginfo = Orderbillinginfo::where("order_id", $order->id)->first();
        // dd($orderitems);
        return view('frontend.cart.invoice', compact('productdetails', 'order', "billinginfo"));
    }
}
