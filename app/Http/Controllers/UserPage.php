<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class UserPage extends Controller
{
    public function userPage() {
        $listContact = Contact::all();
        return view('users.account', compact('listContact'));
    }
}
