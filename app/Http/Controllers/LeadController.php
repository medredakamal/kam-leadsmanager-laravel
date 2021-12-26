<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddLeadRequest;
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


    // Store Lead
    public function storeLead(AddLeadRequest $addleadrequest)
    {

        try {

            $addleadrequest->validated();

            $lead = new Lead();
            $lead->fullname = $addleadrequest->fullname;
            $lead->email = $addleadrequest->email;
            $lead->phonenumber = $addleadrequest->phonenumber;
            $lead->location = $addleadrequest->location;

            $lead->save();
            return response()->json(["res" => "success", "msg" => "Lead added successfully !"]);
        } catch (Exception $e) {
            return response()->json(["res" => "error", "msg" => $e->getMessage()]);
        }
    }
}