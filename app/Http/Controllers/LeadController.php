<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    // Leads Homepage
    public function index()
    {
        return view('app.index');
    }
}