<?php

use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Orderproductattribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Setting;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


function getCategories($parent_id)
{
    return Category::where('parent_id', $parent_id)
        ->where("featured", 1)->orderBy('category_order', 'ASC')->limit(14)->get();
}
function getblogs()
{
    return Blog::get();
}
function getProductName($id)
{
    return Product::where("id", $id)->first();
}
function getAttributeGroupName($id)
{
    return AttributeGroup::where("id", $id)->first();
}
function getAttributName($id)
{
    return Attribute::where("id", $id)->first();
}

function getSetting()
{
    return  Setting::where("id", 1)->first();
}
function getCoupon($id)
{
    return  Coupon::where("id", $id)->first();
}

function getCartAttributes($attributeid)
{
    // dd($attributeid);
    return Attribute::where('id', $attributeid)->first();
}

function getParentCategory($parent_id)
{
    $breadcrumb = [];
    $parent = Category::where('id', $parent_id)->first();
    array_push($breadcrumb, $parent);
    if ($parent->parent_id != 0) {
        return  getParentCategory($parent->parent_id, $breadcrumb);
    }
    // dd($parent);
    return array_reverse($breadcrumb);;
}

function getWishlist($productid)
{
    return wishlist::where('productid', $productid)
        ->where('userid', Auth::guard('customer_registrations')->user()->id)
        ->first();
}

function getproductattribute($orderitemid)
{
    return Orderproductattribute::where("order_item_id", $orderitemid)->get();
}

function totalCartQuantity()
{
    $items = \Cart::getContent();

    return $items->count();
}
function getAttributes($attributegroupid)
{
    return Attribute::where('attribute_group_id', $attributegroupid)->get();
}

function getAttributeGroups()
{
    return AttributeGroup::get();
}
function showAttributes($attributegroupid, $product_id)
{
    // dd(Softsaro_Product_Attribute::where('attribute_group_id', $attributegroupid)
    //     ->where("product_id",$product_id)->get());
    // return Softsaro_Product_Attribute::where('attribute_group_id', $attributegroupid)
    // ->where("product_id",$product_id)->get();

    return ProductAttribute::join("attributes", "attributes.id", "=", "product_attributes.attribute_id")
        ->select('attributes.attribute_name', 'attributes.id')
        ->where('product_attributes.attribute_group_id', $attributegroupid)
        ->where("product_id", $product_id)
        ->get();
}

function getMetas($segment1, $segment2)
{
    if ($segment1 === 'blog') {
        return Blog::where('slug', $segment2)->first();
    }

    if ($segment1 === 'product') {
        $product = Product::where('slug', $segment2)->first();

        $meta = (object) [
            'title' => $product->product_name,
            'description' => $product->description,
            'featured_image' => $product->featured_image,
        ];
        // dd($product);
        return $meta;
    }

    if ($segment1 === 'category') {
        $category = Category::where('slug', $segment2)->first();
        $meta = (object) [
            'title' => $category->categoryname,
            'description' => "Category",
            'featured_image' => "portrait-handsome.jpg",
        ];
        // dd($aaa);
        return $meta;
    }
    if ($segment1 === 'categories') {

        $meta = (object) [
            'title' => "Categories",
            'description' => "Category",
            'featured_image' => "portrait-handsome.jpg",
        ];
        // dd($aaa);
        return $meta;
    }

    if ($segment1 === 'brand') {
        $brand = Brand::where('slug', $segment2)->first();
        $meta = (object) [
            'title' => $brand->brandname,
            'description' => "Brand",
            'featured_image' => "$brand->image",
        ];
        // dd($aaa);
        return $meta;
    }

    if ($segment1 === 'thankyou') {

        $meta = (object) [
            'title' => "Thank You",
            'description' => "Thank You page",
            'featured_image' => "portrait-handsome.jpg",
        ];
        // dd($aaa);
        return $meta;
    }
    if ($segment1 === 'contact') {

        $meta = (object) [
            'title' => "Contact",
            'description' => "Contact us page",
            'featured_image' => "portrait-handsome.jpg",
        ];
        // dd($aaa);
        return $meta;
    }

    // if ($segment1 === 'aboutus') {

    //     $meta = (object) [
    //         'title' => "About Us",
    //         'description' => "About Us page",
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     // dd($aaa);
    //     return $meta;
    // }

    if ($segment1 === 'blogs') {
        $meta = (object) [
            'title' => "Blogs",
            'description' => "Blogs of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    if ($segment1 === 'cart') {
        $meta = (object) [
            'title' => "Cart",
            'description' => "Cart of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    if ($segment1 === 'wishlist') {
        $meta = (object) [
            'title' => "Wishlist",
            'description' => "Wishlist of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    // if ($segment1 === '/') {
    //     $meta = (object) [
    //         'title' => "Home",
    //         'description' => "Homepage of Zupish",
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     return $meta;
    // }

    // if ($segment1 === 'thankyou') {
    //     $meta = (object) [
    //         'title' => "ThankYou",
    //         'description' => "ThankYou Page of Zupish",
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     return $meta;
    // }

    // if ($segment1 === 'products') {
    //     // $product = Request::input('s');
    //     if (Request::input('categoryname')) {
    //         $catslug = Request::input('categoryname');
    //         $categoryname = Softsaro_Category::where('slug', $catslug)->first();

    //         $meta = (object) [
    //             'title' => $categoryname->categoryname,
    //             'description' => "Homepage of Zupish",
    //             'featured_image' => "portrait-handsome.jpg",
    //         ];
    //         return $meta;
    //     }

    //     $meta = (object) [
    //         'title' => "Search Product",
    //         'description' => "Homepage of Zupish",
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     return $meta;
    // }

    if ($segment1 === 'search') {

        $blog = Request::input('searchterm');

        $meta = (object) [
            'title' => $blog,
            'description' => "Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    if ($segment1 === 'forgotpassword') {

        $meta = (object) [
            'title' => "Forgot Password",
            'description' => "Forgot Password",
            'featured_image' => "portrait-handsome.jpg",
        ];
        // dd($aaa);
        return $meta;
    }

    if ($segment1 === 'checkotp') {
        $meta = (object) [
            'title' => "Check  OTP",
            'description' => "Check OTP",
            'featured_image' => "portrait-handsome.jpg",
        ];
        // dd($aaa);
        return $meta;
    }

    if ($segment1 === 'changepassword') {
        $meta = (object) [
            'title' => "Change Password",
            'description' => "Change Password",
            'featured_image' => "portrait-handsome.jpg",
        ];
        // dd($aaa);
        return $meta;
    }

    // if ($segment1 === 'shop') {
    //     $meta = (object) [
    //         'title' => "Shop",
    //         'description' => "Shop of Zupish",
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     return $meta;
    // }






    // if ($segment1 === 'search' && $segment2 === 'blog') {
    //     $searchterm = request('searchterm');
    //     $meta = (object) [
    //         'title' => $searchterm,
    //         'description' => $searchterm,
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     return $meta;
    // }


    if ($segment1 === 'checkout') {
        $meta = (object) [
            'title' => "Checkout",
            'description' => "checkout of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    if ($segment1 === 'newarrival') {
        $meta = (object) [
            'title' => "New Arrival",
            'description' => "New Arrival of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    if ($segment1 === 'trending') {
        $meta = (object) [
            'title' => "Trending Product",
            'description' => "Trending Product of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    if ($segment1 === 'topsellingproducts') {
        $meta = (object) [
            'title' => "Top Selling Products",
            'description' => "Top Selling Products of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    if ($segment1 === 'register') {
        $meta = (object) [
            'title' => "Register",
            'description' => "Register User of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }
    if ($segment1 === 'login') {
        $meta = (object) [
            'title' => "Login",
            'description' => "Login User of Zupish",
            'featured_image' => "portrait-handsome.jpg",
        ];
        return $meta;
    }

    // if ($segment1 === 'termsandcondition') {
    //     $meta = (object) [
    //         'title' => "Terms and Condition",
    //         'description' => "Terms and Condition of Zupish",
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     return $meta;
    // }

    // if ($segment1 === 'privacypolicy') {
    //     $meta = (object) [
    //         'title' => "Privacy Policy",
    //         'description' => "Privacy Policy of Zupish",
    //         'featured_image' => "portrait-handsome.jpg",
    //     ];
    //     return $meta;
    // }


    // if ($segment1 === 'propertytype') {

    //     $fav=FavIcon::first();

    //     $cat= Category::where('slug', $segment2)->first();
    //     $meta = (object) [
    //         'title' => $cat->categoryname,
    //         'description' => $cat->categoryname,
    //         'featured_image' => $fav->icon,
    //     ];
    //     return $meta;
    // }
}
