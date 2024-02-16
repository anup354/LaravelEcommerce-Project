<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Mail;

class FrontendContactController extends Controller
{
    public function contactus()
    {
        // $contactdesc=Softsaro_Quicklink::where("link","https://investfornepal.com/contact")->first();
        // dd($contactdesc);
        return view("frontend.contactus.contact");
    }


    public function storecontactus(StoreContactRequest $request)
    {
        $req = $request->all();

        $add_product = ContactUs::create($req);
        $mailData = $add_product;
        Mail::to('anup@softsaro.com')->send(new ContactMail($mailData));
        
        return redirect()->back()->with('popsuccess', 'Contact Successfully');

    }
}
