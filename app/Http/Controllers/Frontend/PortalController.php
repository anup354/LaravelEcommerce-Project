<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customerdeliveryaddress;
use App\Models\CustomerRegistration;
use App\Models\Order;
use App\Models\Orderbillinginfo;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PortalController extends Controller
{
    public function update_delivery_address(Request $request, $userid)
    {
        // dd($userid);
        $request->validate([
            'delivery_name' => 'required|string',
            'delivery_email' => 'required|email',
            'delivery_phonenumber' => 'required|string',
            'delivery_address' => 'required|string',

        ]);
        $deliveraddress = Customerdeliveryaddress::where("user_id", $userid)->first();
        $deliveraddress->update([
            'delivery_name' => $request->delivery_name,
            'delivery_email' => $request->delivery_email,
            'delivery_phonenumber' => $request->delivery_phonenumber,
            'delivery_address' => $request->delivery_address,
        ]);
        return redirect()->back()->with('success', 'Address updated successfully.');
    }

    public function index()
    {
        $order_list = Order::where('user_id', Auth::guard('customer_registrations')->user()->id)->where('order_status', 'DELIVERED')->latest()->get();
        $user_personal_details = CustomerRegistration::where('id', Auth::guard('customer_registrations')->user()->id)->first();
        $user_details = Customerdeliveryaddress::where('user_id', Auth::guard('customer_registrations')->user()->id)->first();;


        return view('frontend.portal.dashboard.dashboard', compact('user_details', 'user_personal_details', 'order_list'));
    }

    public function profile()
    {
        $user_personal_details = CustomerRegistration::where('id', Auth::guard('customer_registrations')->user()->id)->first();
        return view('frontend.portal.dashboard.profile', compact('user_personal_details'));
    }

    public function update_address(Request $request, CustomerRegistration $userid)
    {
        // dd(  $userid);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phonenumber' => 'required|string',
            'address' => 'required|string',
        ]);
        // 'featured' => ,
        $userid->update([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully.');
    }

    public function passwordChange()
    {
        return view('frontend.portal.dashboard.change_password');
    }

    // public function paymentHistory()
    // {
    //     $commissions = Softsaro_Commission::join("Orders", "softsaro__commissions.order_id", "=", "Orders.id")
    //         ->where("softsaro__commissions.user_id", Auth::guard("customer_registrations")->user()->id)
    //         ->select("softsaro__commissions.*", "Orders.order_id", "Orders.items")
    //         ->get();


    //     return view('frontend.portal.dashboard.paymenthistory', compact("commissions"));
    // }

    public function changePassword(Request $request, CustomerRegistration $userid)
    {
        // dd($userid);
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, Auth::guard('customer_registrations')->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        CustomerRegistration::whereId(Auth::guard('customer_registrations')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->back()->with('success', 'Password updated Successfully');
    }

    public function orderHistory()
    {
        // $order_list = Order::where('user_id', Auth::guard('customer_registrations')->user()->id)->where('order_status', 'DELIVERED')->latest()->get();

        $order_list = Order::where('user_id', Auth::guard('customer_registrations')->user()->id)->latest()->get();
        return view('frontend.portal.dashboard.order_history', compact('order_list'));
    }

    public function orderDetails($orderid)
    {
        $order = Order::where('order_id', $orderid)->first();
        $user_details = Orderbillinginfo::where('order_id', $order->id)->first();

        // $totalprice = $order->amount;
        // $order_status = $order->order_status;
        $ordersWithItems = Order::with(['orderItem', 'orderItem.orderAttributes'])
            ->where('id', $order->id)
            ->get();


        // $ordersWithItems = Order::join('softsaro__order_items', 'Orders.id', '=', 'softsaro__order_items.order_id')
        //     ->join('softsaro__products', 'softsaro__products.id', '=', 'softsaro__order_items.product_id')
        //     ->where("Orders.order_id", $orderid)
        //     ->select('Orders.amount as totalamount', 'Orders.payment_method as payment_method', 'Orders.order_status as order_status', 'Orders.delivery_charge as delivery_charge', 'softsaro__order_items.quantity as order_quantity', 'softsaro__order_items.product_price as ordered_product_price', 'softsaro__products.*')
        //     ->get();
        // dd($ordersWithItems);


        return view('frontend.portal.dashboard.orderdetails', compact('ordersWithItems', 'user_details'));
    }

    public function statements()
    {
        return view('frontend.portal.dashboard.statements');
    }
    public function getOrder(Request $request)
    {
        $order_id = $request->orderid;
        // dd($order_id);
        $order_list = Order::where('order_id', $order_id)->first();

        // if ($order_list->isEmpty()) {
        //     $order_list=null;
        // return view('frontend.dashboard.order_tracking', compact('order_list'));
        // } else {
        return view('frontend.portal.dashboard.order_tracking', compact('order_list'));

        // }


    }
    public function orderTracking()
    {
        $order_list = null;
        return view('frontend.portal.dashboard.order_tracking', compact('order_list'));
    }

    // public function viewaffilatecommission($viewcommission)
    // {
    //     $order = Order::where("order_id", $viewcommission)->first();
    //     $orderitems = Orderitem::join("softsaro__products", "softsaro__order_items.product_id", "=", "softsaro__products.id")
    //         ->where("softsaro__order_items.order_id", $order->id)
    //         ->select("softsaro__order_items.quantity as order_quantity", "softsaro__order_items.product_price as order_productPrice", "softsaro__products.product_name", "softsaro__products.incentive_commission_amount", "softsaro__products.affiliate_commission_amount")
    //         ->get();
    //     // dd($orderitems);
    //     return view('frontend.portal.dashboard.commissionview', compact("orderitems"));
    // }
}
