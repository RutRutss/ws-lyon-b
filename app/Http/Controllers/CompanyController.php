<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Owner;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companies_show = Company::where('is_hide', 0)->get();
        $companies_hide = Company::where('is_hide', 1)->get();
        return view('companies.companies', compact('companies_show', 'companies_hide'));
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

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        try {
            $company = Company::create([
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'company_telephone' => $request->company_telephone,
                'company_email' => $request->company_email
            ]);

            $owner = Owner::create([
                'company_id' => $company->id,
                'name' => $request->owner_name,
                'mobile_number' => $request->owner_mobile_number,
                'email' => $request->owner_email
            ]);

            $contact = Contact::create([
                'company_id' => $company->id,
                'name' => $request->contact_name,
                'mobile_number' => $request->contact_mobile_number,
                'email' => $request->contact_email
            ]);

            return redirect('company/create')->with('message', 'Create New Company Successfully.');
        } catch (Exception $e) {
            return redirect('company/create')->with('message', 'Error to Insert.');
        }
    }

    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
        $owner = Owner::where('company_id', $id)->first();
        $contact = Contact::where('company_id', $id)->first();

        return view('companies.edit', compact('company', 'owner', 'contact'));
    }

    public function update(Request $request, $id)
    {

        $company = Company::findOrFail($id);
        $owner = Owner::where('company_id', $id)->first();
        $contact = Contact::where('company_id', $id)->first();

        try {
            // อัพเดตข้อมูลบริษัท
            $company->update([
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'company_telephone' => $request->company_telephone,
                'company_email' => $request->company_email,
            ]);

            // อัพเดตข้อมูลเจ้าของ
            if ($owner) {
                $owner->update([
                    'name' => $request->owner_name,
                    'mobile_number' => $request->owner_mobile_number,
                    'email' => $request->owner_email,
                ]);
            }

            // อัพเดตข้อมูลผู้ติดต่อ
            if ($contact) {
                $contact->update([
                    'name' => $request->contact_name,
                    'mobile_number' => $request->contact_mobile_number,
                    'email' => $request->contact_email,
                ]);
            }

            // รีไดเรกต์ไปยังหน้าแก้ไขพร้อมข้อความสำเร็จ
            return redirect()->route('company.edit', ['id' => $id])->with('message', 'Edit Successfully.');
        } catch (Exception $e) {

            // ถ้ามีข้อผิดพลาด ให้รีไดเรกต์กลับไปพร้อมข้อความผิดพลาด
            return redirect()->route('company.edit', ['id' => $id])->with('message', 'Error');
        }
    }

    public function hide_company($id)
    {
        $company = Company::findOrFail($id);
        $products = Product::where('company_id', $id)->get();

        try {
            // Toggle ค่า is_hide ของบริษัท
            $company->update([
                'is_hide' => !$company->is_hide
            ]);

            foreach ($products as $product) {
                $product->update([
                    'is_hide' => $company->is_hide
                ]);
            }

            return redirect('companies');
        } catch (Exception $e) {
            return redirect('companies')->with('message', 'Update Status Error.');
        }
    }
}
