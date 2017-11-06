<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    public function getList()
    {
    	$contacts = Contact::all();
    	return view('admin.contacts.list',compact('contacts'));
    }
}
