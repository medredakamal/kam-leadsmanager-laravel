<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    // Leads Homepage
    public function index()
    {
        return view('app.index');
    }

    // Get Leads
    public function getLeads()
    {
        $leads = Lead::get();
        return response()->json(['leads' => $leads]);
    }
}