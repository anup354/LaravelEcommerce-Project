<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $blogs = Blog::orderBy('updated_at', 'DESC')->paginate(4);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
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
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog_img = $this->fileUpload($request, 'featured_image');

        $req = $request->all();

        $req['slug'] = Str::slug($request->title);
        $req['status'] = 1;
        $req['featured_image'] = $blog_img;
        Blog::create($req);

        return redirect()->route('blogs.index')->with('success', 'Blog Added');
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
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact("blog"));
    }

    public function imageDelete($filePath)
    {
        $destinationPath = public_path('uploads/');

        if (file_exists($destinationPath . $filePath)) {
            unlink($destinationPath . $filePath);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($request->hasFile('featured_image')) {
            $this->imageDelete($blog->featured_image);

            $blog_img = $this->fileUpload($request, 'featured_image');
        } else {
            $blog_img = $blog->featured_image;
        }

        $req = $request->all();
        $req['featured_image'] = $blog_img;
        $req['slug'] = Str::slug($request->title);
        $blog->update($req);

        return redirect()->route('blogs.index')->with('success', 'Blog Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->imageDelete($blog->featured_image);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog Successfully Deleted');
    }
}
