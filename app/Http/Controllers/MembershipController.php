<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    function index()
    {

    }

    function subscribeMembership(Request $request)
    {
        dd($request->all());
    }
}
