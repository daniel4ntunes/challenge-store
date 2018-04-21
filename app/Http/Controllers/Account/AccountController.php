<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function indexAction()
    {
        return view('Account.index');
    }
}
