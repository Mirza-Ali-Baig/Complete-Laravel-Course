<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    function index()
    {
        $companies = Company::with('information')->get();
        return response()->json($companies);
    }

    function create()
    {
        $company = Company::create(['name' => 'Google','user_id' => 1]);
        $company->information()->create([
            'address' => '1600 Amphitheatre Parkway, Mountain View, CA 94043, USA',
            'phone' => '01712345678',
            'website' => 'https://www.google.com',
        ]);
        return response()->json($company);
    }
}
