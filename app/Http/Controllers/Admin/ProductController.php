<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\AttributeGroup;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Productcategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Product::latest()->paginate(5);

        return view("admin.products.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributegroups = AttributeGroup::latest()->get();
        $brands = Brand::latest()->get();

        return view("admin.products.create", compact("attributegroups", "brands"));
    }


    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/uploads/';
            $imageName = date('YmdHis') . $name . "." . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function imageDelete($filePath)
    {
        $destinationPath = public_path('uploads/');

        if (file_exists($destinationPath . $filePath)) {
            unlink($destinationPath . $filePath);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        // dd($request);
        $selectedAttributes = $request->input('attributes');
        $allcat = $request->category;
        $product_img = $this->fileUpload($request, 'featured_image');
        $video_file = $this->fileUpload($request, 'video');

        $req = $request->all();
        if ($request->tax_type == "excludingtax") {
            $req["tax_type"] = "excludingtax";
            $req["tax_percentage"] = 0;
        }

        if ($request->tax_type == "includingtax") {
            $req["tax_type"] = "includingtax";
            $req["tax_percentage"] = $request->tax_percentage;
        }
        // dd($request);
        if ($request->disc) {
            $req['discount_amount'] = $request->discount_amount;
        } else {
            $req['discount_amount'] = "";
        }
        $req['slug'] = Str::slug($request->product_name);
        $req['featured_image'] = $product_img;
        // $req['category_id'] = $request->category;
        $req['video'] = $video_file;
        $add_product = Product::create($req);

        if ($add_product->id) {
            foreach ($allcat as $key => $value) {
                Productcategory::create([
                    'product_id' => $add_product->id,
                    'category_id' => $value,

                ]);
                // dd($value);
            }
        }
        if ($selectedAttributes) {
            foreach ($selectedAttributes as $attributegroupID => $attributeItems) {
                foreach ($attributeItems as $attributeItemID) {
                    // Create a new ProductAttribute record for each selected attribute item.
                    ProductAttribute::create([
                        'product_id' => $add_product->id,
                        'attribute_group_id' => $attributegroupID,
                        'attribute_id' => $attributeItemID,
                    ]);
                }
            }
        }
        return redirect()->route('myimage', $add_product->id)->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $productImages = ProductImage::where('product_id', $product->id)->get();

        // $attributeItems = Softsaro_Product_Attribute::join("softsaro__attributes_groups", "softsaro__attributes_groups.id", "=", "softsaro__product__attributes.attribute_group_id")
        // ->select("softsaro__attributes_groups.*","softsaro__product__attributes.*")
        //     ->where("product_id", $product->id)
        //     ->distinct()
        //     ->get();

        $attributeItems = ProductAttribute::join("attribute_groups", "attribute_groups.id", "=", "product_attributes.attribute_group_id")
            ->select('product_attributes.attribute_group_id', 'attribute_groups.attribute_group_name')
            ->where('product_id', $product->id)
            ->distinct()
            ->get();
        // dd($attributeItems);

        $productcategories = Productcategory::where("product_id", $product->id)->get();


        return view('admin.products.show', compact('product', "attributeItems", 'productImages', "productcategories"));
    }

    public function productImage(Request $request)
    {
        $image = $request->file("file");
        $destinationPath = public_path('uploads');
        $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
        $myfeatured_image = $this->fileUpload($request, 'images');
        ProductImage::create([
            'product_id' => $request->product_id,
            'images' => $imageName,
        ]);

        // return redirect()->route('myimage',$request->product_id)->with('success', 'Images Added');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $attributegroups = AttributeGroup::latest()->get();

        $attributeItem = ProductAttribute::where("product_id", $product->id)->pluck("attribute_id")->toArray();

        $productcategory = Productcategory::where("product_id", $product->id)->get();

        $brands = Brand::latest()->get();


        return view("admin.products.edit", compact('product', 'brands', "attributeItem", 'productcategory', 'attributegroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request);
        $checkboxValues = $request->subcategory_ids;
        $selectedAttributes = $request->input('attributes');


        if ($request->hasFile('featured_image')) {
            $this->imageDelete($product->featured_image);
            $myfeatured_image = $this->fileUpload($request, 'featured_image');
        } else {
            $myfeatured_image = $product->featured_image;
        }
        if ($request->hasFile('video')) {
            if ($product->video) {
                $this->imageDelete($product->video);
            }
            $product_video = $this->fileUpload($request, 'video');
        } else {
            $product_video = $product->video;
        }

        $req = $request->all();

        if ($request->tax_type == "excludingtax") {
            $req["tax_type"] = "excludingtax";
            $req["tax_percentage"] = 0;
        }

        if ($request->tax_type == "includingtax") {
            $req["tax_type"] = "includingtax";
            $req["tax_percentage"] = $request->tax_percentage;
        }
        if ($request->disc) {
            $req['discount_amount'] = $request->discount_amount;
        } else {
            $req['discount_amount'] = "";
        }
        $req['featured_image'] = $myfeatured_image;
        $req['slug'] = Str::slug($request->product_name);
        // $req['category_id'] = $request->subcategory_ids;
        $req['video'] = $product_video;
        $product->update($req);

        if ($checkboxValues) {
            Productcategory::where('product_id', $product->id)->delete();
            // DB::table('product_categories')->where('product_id', $product->id)->delete();
            foreach ($checkboxValues as $key => $value) {
                Productcategory::create([
                    'product_id' => $product->id,
                    'category_id' => $value,
                ]);
            }
        }
        if ($selectedAttributes) {
            ProductAttribute::where('product_id', $product->id)->delete();

            foreach ($selectedAttributes as $attributegroupID => $attributeItems) {
                foreach ($attributeItems as $attributeItemID) {
                    // Create a new ProductAttribute record for each selected attribute item.
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_group_id' => $attributegroupID,
                        'attribute_id' => $attributeItemID,
                    ]);
                }
            }
        }

        return redirect()->route('product.index')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Productcategory::where('product_id', $product->id)->delete();
        ProductAttribute::where('product_id', $product->id)->delete();


        $this->imageDelete($product->featured_image);
        if ($product->video) {
            $this->imageDelete($product->video);
        }

        $propertyImages = ProductImage::where('product_id', $product->id)->get();

        if (!$propertyImages->isEmpty()) {
            foreach ($propertyImages as $image) {
                $this->imageDelete($image->images);
            }
            $propertyImages->each->delete();
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product Successfully Deleted');
    }

    public function imagecreate(Product $product)
    {
        $productImages = ProductImage::where('product_id', $product->id)->get();
        return view('admin.products.images.addimage', compact('product', 'productImages'));
    }

    public function deleteImage(Request $request, ProductImage $img)
    {
        $product = $img->product_id;
        $img->delete();
        $this->imageDelete($img->images);
        if ($request->filefrom == "insidedropzone") {
            return redirect()->route('myimage', $product)->with('success', 'Image Successfully Deleted');
        }
        if ($request->filefrom == "insideshow") {

            return redirect()->route('product.show', $product)->with('success', 'Image Successfully Deleted');
        }
    }
}
