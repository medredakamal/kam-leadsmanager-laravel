<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route : Leads Homepage route
Route::get('/', [LeadController::class, 'index'])->name('leads.index');

// ** Ajax Calls **

// Get Leads
Route::get('/leads', [LeadController::class, 'getLeads'])->name('leads.getleads');
// Add Lead
Route::post('/leads/addlead', [LeadController::class, 'storeLead'])->name('leads.addlead');