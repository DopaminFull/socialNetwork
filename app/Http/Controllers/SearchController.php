<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function client(Request $request)
    {
        return  auth()->user()->searchclients($request->name);
    }
}
