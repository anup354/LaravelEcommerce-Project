<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function AttributesController(Request $request)
    {
        $attrbutegroup_id = $request->groupid;
        // dd($attrbutegroup_id);
        if ($attrbutegroup_id == 0) {
            $attributes = Attribute::latest()->paginate(4);
        } else {

            $attributes = Attribute::where("attribute_group_id", $request->groupid)->paginate(4);
        }
        $attributeGroups = AttributeGroup::latest()->get();
        return view('admin.attributes.index', compact('attributes', 'attributeGroups', 'attrbutegroup_id'));
    }

    public function index()
    {
        $attrbutegroup_id = 0;
        $attributeGroups = AttributeGroup::latest()->get();
        $attributes = Attribute::latest()->paginate(4);
        return view('admin.attributes.index', compact('attributes', 'attributeGroups', 'attrbutegroup_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributeGroups = AttributeGroup::latest()->get();
        return view('admin.attributes.create', compact('attributeGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeRequest $request)
    {
        $input = $request->all();
        $input["slug"] = Str::slug($request->attribute_name);
        Attribute::create($input);

        return redirect()->route('attributes.index')->with('success', 'Attribute created successfully.');
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
    public function edit(Attribute $attribute)
    {
        $attributeGroups = AttributeGroup::latest()->get(); // Retrieve all blog entries
        return view('admin.attributes.edit', compact("attribute", "attributeGroups"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        $input = $request->all();
        $input["slug"] = Str::slug($request->attribute_name);
        $attribute->update($input);
        return redirect()->route('attributes.index')->with('success', 'Attribute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('attributes.index')->with('success', 'Attribute deleted successfully.');
    }
}
