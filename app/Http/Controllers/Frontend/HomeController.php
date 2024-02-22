<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductReviewRequest;
use App\Mail\OrderInformation;
use App\Mail\SendCustomerOrderInformation;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CustomerRegistration;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Orderbillinginfo;
use App\Models\Orderitem;
use App\Models\Orderproductattribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Productcategory;
use App\Models\ProductImage;
use App\Models\productreview;
use App\Models\Setting;
use App\Models\TermandPolicy;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class HomeController extends Controller
{
    public function home()
    {
        $faqs = Faq::orderBy("order", "asc")->get();
        $banners = Banner::orderBy("banner_order", "asc")->get();
        $blogs = Blog::latest()->get();
        $brands = Brand::latest()->limit(4)->get();
        $latestproducts = Product::latest()->limit(4)->get();
        $bestsellers = Product::orderBy("total_sale", "desc")->limit(4)->get();
        $allproducts = Product::where("slider", 1)->latest()->get();
        $categories = Category::where("parent_id", 0)->limit(6)->get();
        return view("frontend.homepage.index", compact("banners", "categories", "bestsellers", "allproducts", "blogs", "brands", "latestproducts", "faqs"));
    }

    public function allblogs()
    {
        $blogs = Blog::latest()->get();
        $title = "Blogs";
        $message = "Blogs found";
        $searchterm = "";
        return view("frontend.Blogs.blogs", compact("blogs", "title", "message", "searchterm"));
    }

    public function showblog(Blog $blog)
    {
        $allblogs = Blog::where('id', '!=', $blog->id)->limit(4)->get();
        return view("frontend.Blogs.singlepage", compact("blog", "allblogs"));
    }

    public function searchblog(Request $request)
    {
        $searchterm = $request->searchterm;
        // dd($searchterm);
        $title = "Search Blogs for ( " . $searchterm . ")";

        $blogs = Blog::where('title', 'like', '%' . $searchterm . '%')
            ->orWhere('description', 'like', '%' . $searchterm . '%')
            ->paginate(250);
        if (!$blogs->isEmpty()) {
            $message = "Blogs found";
            return view("frontend.Blogs.blogs", compact("blogs", "title", "message", "searchterm"));
        } else {
            $message = "No blogs found";
            return view("frontend.Blogs.blogs", compact("blogs", "title", "message", "searchterm"));
        }
    }

    public function products()
    {
        $subtitle = "";
        $title = "All Products";
        $products = Product::paginate(15);
        $params = $_GET;
        return view("frontend.products.allproduct", compact("subtitle", "params", "title", "products"));
    }

    public function wishlist()
    {
        $products = wishlist::join('products', 'wishlists.productid', '=', 'products.id')
            ->where('wishlists.userid', Auth::guard('customer_registrations')->user()->id)
            ->select('wishlists.*', 'products.*')
            ->paginate(15);
        // $products = Softsaro_Product::get();
        $title = "Wishlist";
        return view("frontend.wishlist.list", compact("title", "products"));
    }
    public function addwishlist(Product $product)
    {
        if (!Auth::guard('customer_registrations')->user()) {

            return [
                'success' => false,
                'requiresAuth' => true,
                'message' => 'Please login to continue.',
            ];
        }
        $check = wishlist::where('productid', $product->id)
            ->where('userid', Auth::guard('customer_registrations')->user()->id)
            ->first();
        if ($check) {
            return [
                'success' => false,
                'cartsaved' => true,
                'message' => 'Product already added in Wishlist.',
            ];
        }

        wishlist::create([
            'productid' => $product->id,
            'userid' => Auth::guard('customer_registrations')->user()->id,
        ]);
        // return redirect()->route('login')->with('success', 'Successfully Registered');
    }

    public function removewishlist(Product $product)
    {
        $deletewish = wishlist::where('productid', $product->id)
            ->where('userid', Auth::guard('customer_registrations')->user()->id)
            ->first();

        $deletewish->delete();
    }

    public function orderExists($numberOfDigits)
    {
        $min = pow(10, $numberOfDigits - 1);
        $max = pow(10, $numberOfDigits) - 1;
        $random_number = rand($min, $max);
        $random_check = Order::where('order_id', $random_number)->first();
        if ($random_check) {
            return $this->orderExists($numberOfDigits);
        }
        return $random_number;
    }

    public function checkcouponcode(Request $request)
    {

        if ($request->couponcode) {
            if (!Auth::guard('customer_registrations')->user()) {
                return [
                    'success' => false,
                    'message' => 'Please Login to use Coupon.',
                ];
            }
            $checkcoupon = Coupon::where('title', $request->couponcode)->first();
            if ($checkcoupon) {
                return [
                    'success' => true,
                    'data' => $checkcoupon,
                    'message' => 'Coupon code matched .',
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Coupon code does not match.',
                ];
            }
        }
    }
    public function thanks()
    {
        return view("frontend.cart.thankyou");
    }

    public function checkout()
    {
        $items = \Cart::getContent()->sort();
        if (Auth::guard('customer_registrations')->user()) {
            $users = CustomerRegistration::where("id", Auth::guard('customer_registrations')->user()->id)->first();
            return view("frontend.cart.checkout", compact("items", "users"));
        }
        $users = "";
        return view("frontend.cart.checkout", compact("items", "users"));
    }

    public function changePaymentStatus($orderid)
    {
        // dd($orderid);
        $placedorder = Order::where('order_id', $orderid)->first();
        $placedorder->payment_status = "COMPLETED";
        $placedorder->save();
        \Cart::clear();

        return redirect()->route('thanks')->with('success', 'Order Successfully Placed');
    }

    public function initiate_imePay($token, $merchantCodes, $amount, $order_id, $returnUrl)
    {
        // Set the data parameters
        $tokenId = $token;
        $merchantCode = $merchantCodes;
        $refId = $order_id;
        $tranAmount = $amount;
        $method = "GET"; // Replace with the actual payment method
        $respUrl = $returnUrl;
        $cancelUrl = $returnUrl;
        // $cancelUrl = base_url() . 'payment/cancel';
        // Compose the payload string
        $payloadString = implode('|', [$tokenId, $merchantCode, $refId, $tranAmount, $method, $respUrl, $cancelUrl]);
        // Encode the payload string into Base64
        $base64Encoded = base64_encode($payloadString);
        // URL encode the Base64-encoded payload
        $urlEncoded = urlencode($base64Encoded);
        // Construct the redirect URL
        $redirectUrl = "https://stg.imepay.com.np:7979/WebCheckout/Checkout?data={$urlEncoded}";
        // dd($redirectUrl);
        return $redirectUrl;
    }



    public function verify_ime_payment(Request $request)
    {
        $token = $request->data;
        $decoded = base64_decode($token);
        $dataArray = explode("|", $decoded);
        if ($dataArray[0] == "0") {

            $api_user = "softsaro";
            $api_password = "ime@1234";
            $module = "SOFTSARO";
            $merchantCode = "SOFTSARO";
            // Encode credentials and module using Base64
            $credentials = base64_encode("$api_user:$api_password");
            $encoded_module = base64_encode($module);

            // Set the API URL
            $api_url = "https://stg.imepay.com.np:7979/api/Web/Confirm";
            // Prepare the request JSON parameters
            $request_data = json_encode([
                "MerchantCode" => $merchantCode,
                "RefId" => $dataArray[4],
                "TokenId" => $dataArray[6],
                "TransactionId" => $dataArray[3],
                "Msisdn" => $dataArray[2]
            ]);
            // Prepare headers with Authorization and Module
            $headers = [
                "Authorization: Basic $credentials",
                "Module: $encoded_module",
                "Content-Type: application/json"
            ];
            // Initialize cURL session
            $ch = curl_init($api_url);
            // Set cURL options
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            // Execute cURL session and get the response
            $response = curl_exec($ch);
            // Check for cURL errors
            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }
            // Close cURL session
            curl_close($ch);
            // Decode and print the response JSON
            $response_json = json_decode($response, true);
            // dd($response);
            if ($response_json['ResponseCode'] == "0") {
                DB::table('orders')->where('order_id', $response_json['RefId'])->update([
                    'payment_status' => 'RECEIVED'
                ]);
                return redirect()->route('thankyou');
            }
        }
    }


    public function IMEPay($amount, $orderid)
    {

        $returnURL =  route("changePaymentStatus", 1);
        $api_user = "softsaro";
        $api_password = "ime@1234";
        $module = "SOFTSARO";
        $merchantCode = "SOFTSARO";
        $credentials = base64_encode("$api_user:$api_password");
        $encoded_module = base64_encode($module);
        // Set the API URL
        $api_url = "https://stg.imepay.com.np:7979/api/Web/GetToken";
        // Prepare the request JSON parameters
        $request_data = json_encode([
            "MerchantCode" => $merchantCode,
            "Amount" => $amount,
            "RefId" => $orderid
        ]);
        // Prepare headers with Authorization and Module
        $headers = [
            "Authorization: Basic $credentials",
            "Module: $encoded_module",
            "Content-Type: application/json"
        ];
        // Initialize cURL session
        $ch = curl_init($api_url);
        // Set cURL options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // Execute cURL session and get the response
        $response = curl_exec($ch);
        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }
        // Close cURL session
        curl_close($ch);
        // Decode and print the response JSON
        $response_json = json_decode($response, true);
        // dd($response_json);
        $initiatepayment = $this->initiate_imePay($response_json["TokenId"], $merchantCode, $response_json["Amount"], $response_json["RefId"], $returnURL);
        return redirect($initiatepayment);
    }
    public function checkoutpay(Request $request)
    {
        $totalpriceamount = 15000;
        $setting = Setting::first();
        $sumprice = \Cart::getSubTotal();

        // dd($request);
        if ($sumprice > $totalpriceamount) {
            $deliverycharge = 0;
        } else {
            if ($request->order_from == "valleyin") {

                $deliverycharge = $setting->delivery_insidevalley;
            }
            if ($request->order_from == "valleyout") {
                $deliverycharge = $setting->delivery_outsidevalley;
            }
            $deliverycharge = $request->delivery_charge_;
        }

        $totalamount = $sumprice + $request->taxamount + $request->delivery_charge_;


        if (Auth::guard('customer_registrations')->user()) {

            if ($request->couponcode) {
                $checkcoupon = Coupon::where('title', $request->couponcode)->first();
                if ($checkcoupon) {
                    $code = $checkcoupon->id;
                    $discount = ($checkcoupon->discount_amount / 100) * $totalamount;
                    $totalprice = $totalamount - $discount;
                } else {
                    $totalprice = $totalamount;
                    $code = null;
                    $discount = 0;
                }
            } else {
                $code = null;
                $discount = 0;

                $totalprice = $totalamount;
            }
        } else {
            $code = null;
            $discount = 0;

            $totalprice = $totalamount;
        }

        $validated = $request->validate([
            'billing_name' => 'required',
            'billing_address' => 'required',
            'billing_phonenumber' => 'required|digits:10',
            // 'paymentmethod' => 'required',
        ]);

        $items = \Cart::getContent();

        if ($items->isEmpty()) {

            return redirect()->back()->with('error', 'Your cart is Empty');
        }
        // if ($totalamount != $request->alltotalamount) {
        //     abort(404);
        // }
        // dd($request->delivery_charge_);

        // if ($request->alltotalamount != $totalamount) {
        //     dd($request->totalamount);
        // }

        $items = \Cart::getContent();
        if (!$items) {
            return redirect()->back()->with('error', 'No items found in cart');
        }
        $sumprice = \Cart::getSubTotal();

        $ordernum = $this->orderExists(8);
        $orderid = "order_" . $ordernum;
        // dd($request);
        // dd($sum);
        if (Auth::guard('customer_registrations')->user()) {
            $userid = Auth::guard('customer_registrations')->user()->id;
        } else {
            $userid = "0";
        }

        $taxcalac = Setting::first();
        $taxpercent = $taxcalac->tax;
        $ordertable = Order::create([
            'user_id' => $userid,
            'order_id' => $orderid,
            'items' => $items->count(),
            'amount' => $totalprice,
            'coupondiscount' =>  $discount,
            // 'amount' => $request->alltotalamount,
            'payment_method' => $request->paymentmethod,
            'order_status' => "PROCESSING",
            'payment_status' => "PENDING",
            'view_status' => 0,
            'order_from' => $request->order_from,
            'taxamount' => $request->taxamount,
            'taxpercent' => $taxpercent,
            'coupon' => $code,
            'delivery_charge' => $deliverycharge,
        ]);

        // @dd($item->associatedModel->id)

        foreach ($items as $item) {
            $product = Product::where("id", $item->associatedModel->id)->first();
            $product->product_stock -= $item->quantity;
            $product->total_sale += $item->quantity;
            $product->save();
            $orderitem = Orderitem::create([
                'order_id' => $ordertable->id,
                'product_id' => $product->id,
                'quantity' => $item->quantity,
                'product_price' => (int)$product->product_price - (int)$product->discount_amount,
            ]);

            if ($item->attributes->attr) {
                foreach ($item->attributes->attr as $key => $attri) {
                    Orderproductattribute::create([
                        'order_id' => $ordertable->id,
                        'order_item_id' => $orderitem->id,
                        'product_id' => $product->id,
                        'attribute_group_id' => $key,
                        'attribute_id' => $attri,
                    ]);
                }
            }
        }

        Orderbillinginfo::create([
            'order_id' => $ordertable->id,
            'billing_name' => $request->billing_name,
            'billing_email' => $request->billing_email,
            'billing_address' => $request->billing_address,
            'billing_phonenumber' => $request->billing_phonenumber,

            'shipping_name' => $request->shipping_name ?? $request->billing_name,
            'shipping_email' => $request->shipping_email ?? $request->billing_email,
            'shipping_address' => $request->shipping_address ?? $request->billing_address,
            'shipping_phonenumber' => $request->shipping_phonenumber ?? $request->billing_phonenumber,
        ]);



        $order = Order::where('order_id', $ordertable->order_id)->first();
        $ordersWithItems = Order::with(['orderItem', 'orderItem.orderAttributes'])
            ->where('id', $ordertable->id)
            ->get();
        $user_details = Orderbillinginfo::where('order_id', $order->id)->first();

        $orderedfrom = $order->order_from == "valleyin" ? "Inside Valley" : "Outside Valley";

        $mailData = [
            'user_details' => $user_details,
            'ordersWithItems' => $ordersWithItems,
            'order_from' => $orderedfrom,
            'affiliate_id' => $order->affilatecode ?? ""
        ];

        Mail::to('anup@softsaro.com')->send(new OrderInformation($mailData));
        if ($user_details->billing_email) {
            Mail::to($user_details->billing_email)->send(new SendCustomerOrderInformation($mailData));
        }

        if ($request->paymentmethod == "Cash-On-Delivery") {
            \Cart::clear();
            return redirect()->route('thanks',)->with('success', 'Order Successfully Placed');
        }


        if ($request->paymentmethod == "Khalti") {
            $amount = $totalamount;
            $customer_name = $request->billing_name;
            $customer_email = $request->billing_email;
            $customer_phone = $request->billing_phonenumber;

            // Create an associative array with the data
            $configs = [
                // "return_url" => "http://127.0.0.1:8000/thankyou",
                "return_url" => route("changePaymentStatus", $ordertable->order_id),
                "website_url" => "http://127.0.0.1:8000/",
                // "amount" =>  10* 100,
                "amount" =>  $amount * 100,
                "purchase_order_id" => $ordertable->order_id,
                "purchase_order_name" => $ordertable->order_id,
                "customer_info" => [
                    "name" => $customer_name,
                    "email" => $customer_email,
                    "phone" => $customer_phone
                ]
            ];

            // Convert the array to a JSON string
            $json_configs = json_encode($configs);

            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'https://khalti.com/api/v2/epayment/initiate/',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $json_configs,
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Key live_secret_key_c67a0b5c28844036a37c7d560176efdf',
                        'Content-Type: application/json',
                    ),
                )
            );
            // live_secret_key_750f68a313614ffeba6dbc5b6e4c55f8
            $response = curl_exec($curl);

            curl_close($curl);

            if ($response) {
                $data = json_decode($response);
                // dd($data);
                // if (!isset($data->payment_url)) {
                //     return back()->with("poperror", "Please make sure to enter a valid phone number.");
                // }

                // return [
                //     'success' => true,
                //     'redirect' => true,
                //     'redirecturl' => $data->payment_url,
                //     'message' => 'Order Successfully Placed'
                // ];
                // Session::put('pidx', $data->pidx);

                return redirect($data->payment_url);
            }
        }


        if ($request->paymentmethod == "imepay") {
            $amount = $totalamount;
            $orderid = $ordertable->order_id;

            $returnURL =  route("changePaymentStatus", $ordertable->order_id);
            $api_user = "softsaro";
            $api_password = "ime@1234";
            $module = "SOFTSARO";
            $merchantCode = "SOFTSARO";
            $credentials = base64_encode("$api_user:$api_password");
            $encoded_module = base64_encode($module);
            // Set the API URL
            $api_url = "https://stg.imepay.com.np:7979/api/Web/GetToken";
            // Prepare the request JSON parameters
            $request_data = json_encode([
                "MerchantCode" => $merchantCode,
                "Amount" => $amount,
                // "Amount" => 10,
                "RefId" => $orderid
            ]);
            // Prepare headers with Authorization and Module
            $headers = [
                "Authorization: Basic $credentials",
                "Module: $encoded_module",
                "Content-Type: application/json"
            ];
            // Initialize cURL session
            $ch = curl_init($api_url);
            // Set cURL options
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            // Execute cURL session and get the response
            $response = curl_exec($ch);
            // Check for cURL errors
            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }
            // Close cURL session
            curl_close($ch);
            // Decode and print the response JSON
            $response_json = json_decode($response, true);
            // dd($response_json);
            $initiatepayment = $this->initiate_imePay($response_json["TokenId"], $merchantCode, $response_json["Amount"], $response_json["RefId"], $returnURL);
            return redirect($initiatepayment);
        }

        return redirect()->back()->with('epoprror', 'Some Problem Occurs');
    }

    public function getParentCategory($parent_id, $breadcrumb = [])
    {
        $parent = Category::where('id', $parent_id)->first();
        array_push($breadcrumb, $parent);
        if ($parent->parent_id != 0) {
            return $this->getParentCategory($parent->parent_id, $breadcrumb);
        }
        // dd($parent);
        return array_reverse($breadcrumb);
    }

    public function singlepage(Request $request, Product $product)
    {

        $productcat = Productcategory::where("product_id", $product->id)->first();
        if ($productcat->category_id) {
            $breadcrumbs = $this->getParentCategory($productcat->category_id);
        } else {
            $breadcrumbs = [];
        }

        $relatedproducts = Productcategory::join("products", "products.id", "=", "productcategories.product_id")->where("productcategories.category_id", $productcat->category_id)->where("productcategories.product_id", "!=", $product->id)->select("products.*")->limit(4)->get();
        // dd($relatedproduct);

        $productImage = ProductImage::where("product_id", $product->id)->get();

        // $attributeItems = ProductAttribute::join("attribute_groups", "attribute_groups.id", "=", "product_attributes.attribute_group_id")
        //     ->select('product_attributes.attribute_group_id', 'attribute_groups.attribute_group_name')
        //     ->where('product_id', $product->id)
        //     ->distinct()
        //     ->get();

        $attributeItems = ProductAttribute::where('product_id', $product->id)->get()->groupBy("attribute_group_id");

        $reviews = productreview::where("product_id", $product->id)->where("status", "VERIFIED")->latest()->get();
        $sum = productreview::where("product_id", $product->id)->where("status", "VERIFIED")->sum("rating");
        $reviewcount = productreview::where("product_id", $product->id)->where("status", "VERIFIED")->count();
        if ($reviewcount == 0) {
            $averagerating = "";
        } else {
            $averagerating = $reviews->avg('rating');
            // $averaterating = $sum / $reviewcount;
        }
        // dd($averaterating);


        return view("frontend.products.singlepage", compact("product", "relatedproducts", "breadcrumbs", "reviews", "averagerating", "reviewcount", "productImage", "attributeItems"));
    }

    public function productreview(StoreProductReviewRequest $request, Product $productreview)
    {
        $req = $request->all();

        if (Auth::guard('customer_registrations')->user()) {
            // dd($request);
            $req['user_id'] = Auth::guard('customer_registrations')->user()->id;
            $req['product_id'] = $productreview->id;
            $req['status'] = "PENDING";
            productreview::create($req);
            return redirect()->back()->with('popsuccess', 'Thanks for your review.');
        } else {
            return redirect()->back()->with('poperror', 'Please login to add review.');
        }
    }

    public function getbybrand(Brand $brand)
    {
        $subtitle = "Brand  ";
        $title = $brand->brandname;
        $breadcrumbs = '';
        $subcategories = '';

        $products = Product::where("brand", $brand->id)->paginate(15);
        $params = $_GET;

        return view("frontend.products.allproduct", compact("subtitle", 'breadcrumbs', 'subcategories', "params", "title", "products"));
    }

    public function allcategories()
    {
        $allcategories = Category::where("parent_id", 0)->paginate(15);
        $params = $_GET;
        $title = "Categories";

        return view("frontend.category.index", compact("allcategories", "title",  "params"));
    }

    public function brands()
    {
        $brands = Brand::orderBy("id", "desc")->paginate(15);
        $params = $_GET;
        $title = "Brands";

        return view("frontend.brand.index", compact("brands", "title",  "params"));
    }

    public function getbycategory(Request $request)
    {
        $categoryId = $request->query('0da2qwz');
        // dd($categoryId);
        $subtitle = "Category  ";
        $category = Category::where('category_id', $categoryId)->first();

        if ($category->id) {
            $breadcrumbs = $this->getParentCategory($category->id);
        } else {
            $breadcrumbs = [];
        }

        $subcategories = Category::where('parent_id', $category->id)->get();
        // dd($parent);
        $title = $category->categoryname;
        $products = Product::join("productcategories", "productcategories.product_id", "=", "products.id")
            ->join("categories", "categories.id", "=", "productcategories.category_id")
            ->where("categories.id", $category->id)
            ->select("products.*")
            ->paginate(15);
        $params = $_GET;

        return view("frontend.products.allproduct", compact("subtitle", "breadcrumbs", 'subcategories', "params", "title", "products"));
    }

    // public function getbycategory(Category $category)
    // {
    //     $subtitle = "Category : ";
    //     $title = $category->categoryname;
    //     $products = Product::join("productcategories", "productcategories.product_id", "=", "products.id")
    //         ->join("categories", "categories.id", "=", "productcategories.category_id")
    //         ->where("categories.id", $category->id)
    //         ->select("products.*")
    //         ->paginate(15);
    //     $params = $_GET;

    //     return view("frontend.products.allproduct", compact("subtitle", "params", "title", "products"));
    // }

    public function newarrival()
    {
        $subtitle = "";
        $title = "Latest Products";
        $products = Product::latest()->paginate(15);
        $params = $_GET;

        return view("frontend.products.allproduct", compact("subtitle", "params", "title", "products"));
    }

    public function trending()
    {
        $subtitle = "";
        $title = "Trending Products";
        $products = Product::latest()->paginate(15);
        $params = $_GET;

        return view("frontend.products.allproduct", compact("subtitle", "params", "title", "products"));
    }

    public function bestsellingproduct()
    {
        $subtitle = "";
        $title = "Top Selling Products";
        $products = Product::orderBy("total_sale", "desc")->paginate(15);
        $params = $_GET;

        return view("frontend.products.allproduct", compact("subtitle", "params", "title", "products"));
    }

    public function filtersearch(Request $request)
    {
        $minPrice = $request->input('min-price');
        $maxPrice = $request->input('max-price');
        $attributeid = $request->input('attributes');
        $catid = $request->categoryid;
        // dd($request->categoryid);

        $products = Product::join('product_attributes', 'product_attributes.product_id', '=', 'products.id')
            ->join('attributes', 'attributes.id', '=', 'product_attributes.attribute_id')
            ->whereIn('attributes.id', $attributeid)
            ->whereBetween('products.product_price', [$minPrice, $maxPrice])
            ->select('products.*')
            ->distinct()
            ->paginate(15);

        $params = $_GET;
        $title = "Filter Products ";
        $subtitle = "";

        return view("frontend.products.allproduct", compact("title", "subtitle", "params", "products"));
    }
    public function autocomplete(Request $request)
    {
        $query = $request->input('term');
        $products = Product::where('product_name', 'LIKE', "%$query%")->limit(10)->get();
        $filteredProducts = $products->map(function ($product) {
            return [
                'product_name' => $product->product_name,
                'product_slug' => $product->slug,
            ];
        });
        return response()->json($filteredProducts);
    }

    public function productsearch(Request $request)
    {
        $query = $request->input('search-term');
        $products = Product::where('product_name', 'LIKE', "%$query%")->paginate(20);
        // $title = $category->categoryname;
        $title = "Search Products for (" . $query . ")";
        $subtitle = "";

        $params = $_GET;
        return view("frontend.products.allproduct", compact("title", "subtitle", "params", "products"));
        // return view("frontend.categorysinglepage.list", compact("title", "products"));
    }

    public function termsandcondition()
    {
        $termspolicy = TermandPolicy::where('id', 1)->first();

        // dd($terms);
        return view('frontend.termsandpolicy.termandpolicy', compact('termspolicy'));
    }
    public function privacypolicy()
    {
        $termspolicy = TermandPolicy::where('id', 2)->first();
        // dd($terms);
        return view('frontend.termsandpolicy.termandpolicy', compact('termspolicy'));
    }

    public function NICASIA()
    {
        dd("NICASIA");
    }
}
