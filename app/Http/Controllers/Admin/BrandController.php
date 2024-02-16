<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $brands = Brand::latest()->paginate(15);
        return view("admin.brand.index", compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */

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

    public function store(StoreBrandRequest $request)
    {
        $req = $request->all();

        $brandimage = $this->fileUpload($request, 'image');
        $req['image'] = $brandimage;

        // dd($request);
        $req['slug'] = Str::slug($request->brandname);
        Brand::create($req);


        return redirect()->route('brand.index')->with('success', 'Brand Added');
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
    public function edit(Brand $brand)
    {
        // dd($brand);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $req = $request->all();
        if ($request->hasFile('image')) {
            $this->imageDelete($brand->image);
            $myimage = $this->fileUpload($request, 'image');
            $req['image'] = $myimage;
        }
        $req['slug'] = Str::slug($request->brandname);
        $brand->update($req);
        return redirect()->route('brand.index')->with('success', 'Brand Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        // dd($request->parent_id);
        $this->imageDelete($brand->image);
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand Deleted');
    }
}
