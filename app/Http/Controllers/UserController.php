<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAdd()
    {
    	return view('admin.users.add');
    }
}
