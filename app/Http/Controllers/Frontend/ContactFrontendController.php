<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactFrontendController extends Controller
{
    public function index()
    {
        // Ambil semua data contact
        $contacts = Contact::all();

        // Kirim ke view
        return view('page.frontend.contact.index', compact('contacts'));
    }
}
