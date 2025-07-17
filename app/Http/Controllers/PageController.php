<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'phone'   => 'nullable|numeric',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Thank you for your message!');
    }
}
