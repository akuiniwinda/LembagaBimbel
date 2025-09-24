<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactFrontendController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('page.frontend.contact.index', compact('contacts'));
    }

    public function create(){
        $contacts = Contact::all();
        return view('page.frontend.contact.create', compact('contacts'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'subject'           => 'required',
            'description'       => 'required',
        ]);

        $datacontact_store = [
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'subject'           => $request->subject,
            'description'       => $request->description
        ];


        Contact::create($datacontact_store);

        return redirect('/adminpanel/contact');
    }
}
