<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Owner;
use App\Models\Product;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companies = Company::all();
        return view('companies.companies', compact('companies'));
    }

    public function show(Request $request)
    {
        $id = $request->query('id');
        $company = Company::where('id', $id)->first();
        $owner = Owner::where('company_id', $id)->first();
        $contact = Contact::where('company_id', $id)->first();
        $products = Product::where('company_id', $id)->get();

        return view('companies.company', compact('company', 'owner', 'contact', 'products'));
    }
}
