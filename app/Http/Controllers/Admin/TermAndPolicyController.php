<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\TermandPolicy;
use Illuminate\Http\Request;

class TermAndPolicyController extends Controller
{
    public function index()
    {
        $quicklinks = TermandPolicy::latest()->paginate(4);
        return view('admin.setting.termandpolicy.link', compact('quicklinks'));
    }

    public function create()
    {
        return view('admin.setting.termandpolicy.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $req = $request->all();

        TermandPolicy::create($req);
        return redirect()->route('pages.index')->with('success', 'Page Successully Added');
    }

    public function edit(TermandPolicy $page)
    {

        return view('admin.setting.termandpolicy.edit', compact('page'));
    }

    public function update(Request $request, TermandPolicy $page)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $req = $request->all();
        $page->update($req);
        return redirect()->route('pages.index')->with('success', 'Page Successully Updated');
    }

    public function destroy(TermandPolicy $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page Successully Deleted');
    }


    public function setting()
    {
        $setting = Setting::first();
        return view('admin.setting.index',compact("setting"));
    }

    public function settingdetails(Request $request)
    {
        // dd($request);
        $setting = Setting::where("id", 1)->first();
        $setting->update([
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,

        ]);
        return redirect()->back()->with('success', 'Details Successully updated');
    }

    public function deliverycharge(Request $request)
    {

        $setting = Setting::where("id", 1)->first();
        $setting->update([
            'delivery_insidevalley' => $request->delivery_insidevalley,
            'delivery_outsidevalley' => $request->delivery_outsidevalley,
            'tax'=>$request->tax

        ]);

        return redirect()->back()->with('success', 'Details Successully updated');

    }
}
