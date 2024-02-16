<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    function getParentCategory($parent_id, $breadcrumb = [])
    {
        $parent = Category::where('id', $parent_id)->first();
        array_push($breadcrumb, $parent);
        if ($parent->parent_id != 0) {
            return  $this->getParentCategory($parent->parent_id, $breadcrumb);
        }
        // dd($parent);
        return array_reverse($breadcrumb);;
    }

    public function index()
    {
        $parent_id = request('category') ?? 0;

        if ($parent_id) {
            $breadcrumbs = $this->getParentCategory($parent_id);
        } else {
            $breadcrumbs = [];
        }


        $categories = Category::where('parent_id', $parent_id)->latest()->paginate(15);
        $params = $_GET;

        return view("admin.categories.index", compact('categories', 'params', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parent_id = request('category') ?? 0;
        if ($parent_id) {
            $breadcrumbs = $this->getParentCategory($parent_id);
        } else {
            $breadcrumbs = [];
        }

        return view('admin.categories.create', compact('breadcrumbs'));
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

    public function categoryExists($numberOfDigits)
    {
        $min = pow(10, $numberOfDigits - 1);
        $max = pow(10, $numberOfDigits) - 1;
        $random_number = rand($min, $max);
        $random_check = Category::where('category_id', $random_number)->first();
        if ($random_check) {
            return $this->categoryExists($numberOfDigits);
        }
        return $random_number;
    }
    public function store(StoreCategoryRequest $request)
    {
        $req = $request->all();

        $categoryimage = $this->fileUpload($request, 'image');
        $req['image'] = $categoryimage;

        // dd($request);
        $catid = $this->categoryExists(8);

        $req['slug'] = Str::slug($request->categoryname);
        $req['parent_id'] = $request->parent_id ?? 0;
        $req['category_id'] = $catid;
        Category::create($req);

        if ($request->parent_id) {
            return redirect()->route('category.index', ['category' => $request->parent_id])->with('success', 'Sub Category Added');
        } else {
            return redirect()->route('category.index')->with('success', 'Category Added');
        }
        // return redirect()->route('category.index')->with('success', 'Category Added');

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
    public function edit(Category $category)
    {
        $parent_id = $category->parent_id ?? 0;
        if ($parent_id) {
            $breadcrumbs = $this->getParentCategory($parent_id);
        } else {
            $breadcrumbs = [];
        }

        return view('admin.categories.edit', compact('category', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $req = $request->all();
        if ($request->hasFile('image')) {
            if ($category->image) {
                $this->imageDelete($category->image);
            }
            $myimage = $this->fileUpload($request, 'image');
            $req['image'] = $myimage;
        }
        $catid = $this->categoryExists(8);

        $req['slug'] = Str::slug($request->categoryname);
        $req['category_id'] = $catid;

        $category->update($req);

        if ($request->parent_id) {
            return redirect()->route('category.index', ['category' => $request->parent_id])->with('success', 'Sub Category Edited');
        } else {
            return redirect()->route('category.index')->with('success', 'Category Edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        // dd($request->parent_id);
        if ($category->image) {
            $this->imageDelete($category->image);
        }
        $category->delete();

        if ($request->parent_id) {
            return redirect()->route('category.index', ['category' => $request->parent_id])->with('success', 'Sub Category Deleted');
        } else {
            return redirect()->route('category.index')->with('success', 'Category Deleted');
        }
    }
}
