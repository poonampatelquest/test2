<?php

namespace App\Http\Controllers\Admin\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Subscriber;
use App\Models\Page\AboutUs;
use App\Models\Page\TermsCondition;
use App\Http\Requests\Page\CMS;
use App\Models\CMSPage;

use Validator;

class PageController extends Controller
{

    public function aboutUs(Request $request)
    {
        $data = CMSPage::find(1);
        return view('admin.page.about-us', compact('data'));
    }

    public function aboutUsUpdate(CMS $request)
    {
        $data = CMSPage::find(1);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return back()->with('status', "Updated Successfully");
    }

    public function termsCondition(Request $request)
    {
        $data = CMSPage::find(2);
        return view('admin.page.terms-conditions', compact('data'));
    }

    public function termsConditionUpdate(CMS $request)
    {
        $data = CMSPage::find(2);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return back()->with('status', "Updated Successfully");
    }

    public function privacyPolicy(Request $request)
    {
        $data = CMSPage::find(3);
        return view('admin.page.privacy-policy', compact('data'));
    }

    public function privacyPolicyUpdate(CMS $request)
    {
        $data = CMSPage::find(3);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return back()->with('status', "Updated Successfully");
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
