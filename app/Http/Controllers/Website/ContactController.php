<?php

namespace App\Http\Controllers\Website;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return contactPage
     *
     */
    public function contact()
    {
        return view('website.contact.contact');
    }
    /**
     * Display a listing of the resource.
     *
     * @return contactPage
     *
     */
    public function submitContact(ContactRequest $request)
    {
        $data = $request->all();
        Contact::create($data);

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
