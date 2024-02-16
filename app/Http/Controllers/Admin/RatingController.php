<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\productreview;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function changestatus(Request $request, productreview $id)
    {
        // dd($id);
        $id->status = $request->changestatus;
        $id->save();

        return redirect()->back()->with("success", "Status Sucessfully Changed.");
    }

    public function index()
    {
        $ratings = productreview::orderBy('rating')->paginate(5);

        return view("admin.rating.index", compact("ratings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(productreview $rating)
    {
        // dd($rating);
        return view("admin.rating.view", compact("rating"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productreview $rating)
    {
        $rating->delete();
        return redirect()->back()->with("success", "Rating Sucessfully Deleted.");
    }
}
