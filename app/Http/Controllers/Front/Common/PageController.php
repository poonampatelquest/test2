<?php

namespace App\Http\Controllers\Front\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Subscriber;
use Validator;

class PageController extends Controller
{

    public function aboutUs(Request $request)
    {
        return view('front.page.about-us');
    }

    public function howItWork(Request $request)
    {
        return view('front.page.how-it-work');
    }

    public function faq(Request $request)
    {
        return view('front.page.faq');
    }

    public function services(Request $request)
    {
        return view('front.page.services');
    }

    public function termsAndCondition(Request $request)
    {
        return view('front.page.terms-conditions');
    }

    public function contactUsShow(Request $request)
    {
        return view('front.page.contact-us');
    }

    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'email'         => 'required|email',
            'subject'         => 'required',
            'phone'         => 'required',
            'message'         => 'required',
        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('status',"Your message send successfully. We will contact with you ASAP");
    }
    
}
