<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CustomerRegistration;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(Request $request)
    {
        $fromdate = $request->input("from") ?? "";
        $todate = $request->input("to") ?? "";

        // $validated = $request->validate([
        //     'productid' => 'required',

        // ]);
        $totaluser = CustomerRegistration::get()->count();
        $totalblog = Blog::get()->count();
        $totalproduct = Product::get()->count();
        $totalorder = Order::get()->count();
        $allorders = Order::where("order_status", "DELIVERED")->orderBy("created_at", "asc")->get();
        $productreports = "";
        $allproducts = Product::get();

        $singleproduct = Product::where("id", $request->productid)->first();
        if ($singleproduct) {
            $productreports = Order::join("orderitems", "orderitems.order_id", "=", "orders.id")
                ->where("orders.order_status", "DELIVERED")->whereBetween("orders.delivered_date", [$fromdate, $todate])->where("product_id", $singleproduct->id)->orderBy("orders.created_at", "asc")->select("orderitems.quantity as orderedquantity", "orderitems.product_id as orderproductid", "orders.delivered_date as orderdeliverydate", "orderitems.id as orderitemid")->get();
        } else {
            $productreports = "";
        }



        $topsellingproduct = Product::orderBy("total_sale", "desc")
            ->where("total_sale", "!=", null)
            ->limit(5)
            ->get();

        return view("admin.dashboard", compact("totaluser", "productreports", "totalblog", "totalproduct", "totalorder", "topsellingproduct", "allproducts", "singleproduct", "fromdate", "todate"));
        // return view("admin.dashboard");
    }


    public function singleproductreport(Request $request)
    {
        $fromdate = $request->input("from");
        $todate = $request->input("to");
        // dd($request->productid);

        $singleproduct = Product::where("id", $request->productid)->first();
        if ($singleproduct) {
            // $productreports = Orderitem::whereBetween("created_at", [$fromdate, $todate])->where("product_id", $singleproduct->id)->get();

            $productreports = Order::join("orderitems", "orderitems.order_id", "=", "orders.id")
                ->where("orders.order_status", "DELIVERED")->whereBetween("orders.delivered_date", [$fromdate, $todate])->where("product_id", $singleproduct->id)->orderBy("orders.created_at", "asc")->select("orderitems.quantity as orderedquantity", "orderitems.product_id as orderproductid", "orders.delivered_date as orderdeliverydate", "orderitems.id as orderitemid")->get();
        } else {
            $productreports = "";
        }

        // dd($product);
        $totaluser = CustomerRegistration::get()->count();
        $totalblog = Blog::get()->count();
        $totalproduct = Product::get()->count();
        $totalorder = Order::get()->count();






        // $productreports="";
        $allproducts = Product::get();

        $topsellingproduct = Product::orderBy("total_sale", "desc")
            ->where("total_sale", "!=", null)
            ->limit(5)
            ->get();

        return view("admin.dashboard", compact("totaluser", "productreports", "totalblog", "totalproduct", "totalorder", "topsellingproduct", "allproducts", "singleproduct", "fromdate", "todate"));

        // return view("admin.dashboard",compact("productreports"));
    }
}
