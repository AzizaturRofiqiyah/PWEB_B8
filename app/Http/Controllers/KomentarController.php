<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        return view('komentar');
    }

    public function insert()
    {
        return view('insert');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
        );
    }
}
