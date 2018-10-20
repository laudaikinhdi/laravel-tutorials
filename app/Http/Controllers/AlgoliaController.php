<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlgoliaController extends Controller
{
    //
    //
    public function search(Request $request)
    {
        return \App\User::search($request->input('q'))->get();
    }
}
