<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeGroupRequest;
use App\Http\Requests\UpdateAttributeGroupRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\AttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributesGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $attributeGroups = AttributeGroup::latest()->paginate(4);

        return view('admin.attributegroups.index', compact("attributeGroups"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attributegroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeGroupRequest $request)
    {
        $attributegroup = $request->all();
        $attributegroup["slug"] = Str::slug($request->attribute_group_name);
        AttributeGroup::create($attributegroup);
        return redirect()->route('attributegroups.index')->with('success', 'Attribute Group created successfully.');
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
    public function edit(AttributeGroup $attributegroup)
    {
        // dd($attributegroup);
        return view('admin.attributegroups.edit', compact("attributegroup"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttributeGroupRequest $request, AttributeGroup $attributegroup)
    {
        $input = $request->all();
        $input["slug"] = Str::slug($request->attribute_group_name);
        $attributegroup->update($input);
        return redirect()->route('attributegroups.index')->with('success', 'Attribute Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttributeGroup $attributegroup)
    {
        $attributegroup->delete();
        return redirect()->route('attributegroups.index')->with('success', 'Attribute Group deleted successfully.');
    }
}
