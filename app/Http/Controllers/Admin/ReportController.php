<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SalesReportExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderbillinginfo;
use App\Models\Product;
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

    // product report
    public function productreport(Request $request)
    {
        $fromdate = $request->input("from") ?? "";
        $todate = $request->input("to") ?? "";

        // $validated = $request->validate([
        //     'productid' => 'required',

        // ]);
        $singleproduct="";
        if ($request->productid) {
            $singleproduct = Product::where("id", $request->productid)->first();
        }

        if ($singleproduct || $fromdate || $todate) {
            $productreports = Order::join("orderitems", "orderitems.order_id", "=", "orders.id")
                ->where("orders.order_status", "DELIVERED");

            if ($singleproduct) {
                $productreports = $productreports->where("orderitems.product_id", $singleproduct->id);
            }
            if ($fromdate) {
                $productreports = $productreports->whereDate("orders.delivered_date", ">=", $fromdate);
            }
            if ($todate) {
                $productreports = $productreports->whereDate("orders.delivered_date", "<=", $todate);
            }
            // ->whereBetween("orders.delivered_date", [$fromdate, $todate])->where("product_id", $singleproduct->id)->orderBy("orders.created_at", "asc")->select("orderitems.quantity as orderedquantity", "orderitems.product_id as orderproductid", "orders.delivered_date as orderdeliverydate", "orderitems.id as orderitemid")->get();
            $productreports = $productreports->orderBy("orders.created_at", "asc")->select("orderitems.quantity as orderedquantity", "orderitems.product_id as orderproductid", "orders.delivered_date as orderdeliverydate", "orderitems.id as orderitemid")->get();
        } else {
            $productreports = Order::join("orderitems", "orderitems.order_id", "=", "orders.id")
            ->where("orders.order_status", "DELIVERED")->orderBy("orders.created_at", "asc")->select("orderitems.quantity as orderedquantity", "orderitems.product_id as orderproductid", "orders.delivered_date as orderdeliverydate", "orderitems.id as orderitemid")->get();
        }
        $allproducts = Product::get();



        return view("admin.Report.productreport", compact( "productreports",  "singleproduct","allproducts", "fromdate", "todate"));
        // return view("admin.dashboard");
    }
}
