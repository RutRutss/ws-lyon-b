<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Owner;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products_show = Product::join('companies', 'companies.id', '=', 'products.company_id')
            ->where('products.is_hide', 0)
            ->get();

        $products_hide = Product::join('companies', 'companies.id', '=', 'products.company_id')
            ->where('products.is_hide', 1)
            ->get();

        return view('products.products', compact('products_show', 'products_hide'));
    }

    public function show($gtin)
    {
        $product = Product::where('gtin', $gtin)->first();

        return view('products.product', compact('product'));
    }

    public function hide_product($gtin)
    {
        $product = Product::where('gtin', $gtin)
            ->join('companies', 'companies.id', '=', 'products.company_id')
            ->select('products.*', 'companies.is_hide as company_is_hide')
            ->first();

        if ($product) {
            if ($product->is_hide == 0 && $product->company_is_hide == 0) {
                $product->is_hide = 1;
                $product->save();

                return redirect('products')->with('message', $product->name_en . 'GTIN : ' . $product->gtin . ' change status to hide.');
            } elseif ($product->is_hide == 1 && $product->company_is_hide == 0) {
                $product->is_hide = 0;
                $product->save();

                return redirect('products')->with('message', $product->name_en . 'GTIN : ' . $product->gtin . ' change status to show.');
            } else if ($product->is_hide == 0 && $product->company_is_hide == 1) {
                $product->is_hide = 1;
                $product->save();
                return redirect('products')->with('message', $product->name_en . 'GTIN : ' . $product->gtin . ' change status to hide.');
            } else {
                return redirect('products')->with('message', $product->name_en . ' (GTIN: ' . $product->gtin . ') cannot be shown because the company status is set to hidden.');
            }
        } else {
            dump('ไม่พบสินค้า');
        }
    }

    public function delete($gtin)
    {
        $product = Product::where('gtin', $gtin)->where('is_hide', 1)->first();


        if ($product) {
            $product->delete();
            return redirect('products')->with('message', $product->name_en . ' GTIN : ' . $product->gtin . ' Delete Successfully.');
        } else {
            return redirect('products')->with('message', ' (GTIN: ' . $gtin . ') cannot be delete because the company status is not hide.');
        }
    }

    public function create()
    {
        $companies = Company::all();
        return view('products.create', compact('companies'));
    }

    public function store(Request $request)
    {
        try {

            $img_name = '';

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $img_name = $request->gtin . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/images', $img_name);
            }

            $product = Product::create([
                'name_en' => $request->name_en,
                'name_fr' => $request->name_fr,
                'description_en' => $request->description_en,
                'description_fr' => $request->description_fr,
                'gtin' => $request->gtin,
                'brand' => $request->brand,
                'country_of_origin' => $request->country_of_origin,
                'weight_gross' => $request->weight_gross,
                'weight_net' => $request->weight_net,
                'weight_unit' => $request->weight_unit,
                'company_id' => $request->company_id,
                'img' => $img_name,
                'is_hide' => 1
            ]);



            return redirect('products/new')->with('message', 'Insert ' . $product->name_en . ' Successfully.');
        } catch (Exception $e) {
            return redirect('products/new')->with('message', 'Can not Insert.' . $e);
        }
    }

    public function delete_image($gtin)
    {
        // ค้นหาผลิตภัณฑ์จาก GTIN
        $product = Product::where('gtin', $gtin)->first();

        if ($product && $product->img) {
            // สร้างเส้นทางของภาพใน storage
            $imagePath = 'public/images/' . $product->img;

            // ตรวจสอบว่าไฟล์มีอยู่ใน storage หรือไม่
            if (Storage::exists($imagePath)) {
                // ลบไฟล์
                Storage::delete($imagePath);
            }

            // ลบชื่อไฟล์ในฐานข้อมูล
            $product->update([
                'img' => ''
            ]);
        }

        // กลับไปยังหน้าเดิมและแสดงข้อความ
        return redirect()->back()->with('message', 'Image deleted successfully.');
    }

    public function update_image(Request $request, $gtin)
    {
        $product = Product::where('gtin', $gtin)->first();

        if ($product && $request->hasFile('img')) {
            $img = $request->file('img');

            $img_name = $gtin . '.' . $img->getClientOriginalExtension();
            $img->storeAs('public/images', $img_name);

            $product->update([
                'img' => $img_name
            ]);

            return redirect()->back()->with('message', 'Image updated successfully.');
        }
    }

    public function all_products(Request $request)
    {
        $keyword = $request->query('query');

        $query = Product::query();

        if ($keyword) {
            $query->where('name_en', 'like', '%' . $keyword . '%')
                ->orWhere('name_fr', 'like', '%' . $keyword . '%')
                ->orWhere('description_en', 'like', '%' . $keyword . '%')
                ->orWhere('description_fr', 'like', '%' . $keyword . '%')
                ->get();
        }

        $products = $query->paginate(10);

        $response = [
            'data' => collect($products->items())->map(function ($product) {
                $company = Company::where('id', $product->company_id)->first();
                $owner = Owner::where('company_id', $company->id)->first();
                $contact = Contact::where('company_id', $company->id)->first();

                return [
                    "name" => [
                        "en" => $product->name_en,
                        "fr" => $product->name_fr
                    ],
                    "description" => [
                        'en' => $product->description_en,
                        'fr' => $product->description_fr
                    ],
                    "gtin" => $product->gtin,
                    "brand" => $product->brand,
                    "countryOfOrigin" => $product->country_of_origin,
                    "weight" => [
                        "gross" => $product->weight_gross,
                        "net" => $product->weight_net,
                        "unit" => $product->weight_unit
                    ],
                    "company" => [
                        "companyName" => $company->company_name,
                        "companyAddress" => $company->company_address,
                        "companyTelephone" => $company->company_telephone,
                        "companyEmail" => $company->company_email,
                        "owner" => [
                            "name" => $owner->name,
                            "mobileNumber" => $owner->mobile_number,
                            "email" => $owner->email
                        ],
                        "contact" => [
                            "name" => $contact->name,
                            "mobileNumber" => $contact->mobile_number,
                            "email" => $contact->email
                        ]
                    ]
                ];
            }),
            'pagination' => [
                'current_page' => $products->currentPage(),
                'total_pages' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'next_page_url' => $products->hasMorePages() ? $products->nextPageUrl() : null,
                'prev_page_url' => $products->previousPageUrl(),
            ]
        ];

        // ส่งข้อมูลในรูปแบบ JSON
        return response()->json($response, 200);
    }


    public function show_product($gtin)
    {
        $product = Product::where('gtin', $gtin)->first();

        if (!$product || $product->is_hide == 1) {
            return response(["status" => "error", "code" => 404, "message" => "404 Not Found."], 404);
        }

        $company = Company::where('id', $product->company_id)->first();
        $owner = Owner::where('company_id', $company->id)->first();
        $contact = Contact::where('company_id', $company->id)->first();

        $response = [
            "name" => [
                "en" => $product->name_en,
                "fr" => $product->name_fr
            ],
            "description" => [
                'en' => $product->description_en,
                'fr' => $product->description_fr
            ],
            "gtin" => $product->gtin,
            "brand" => $product->brand,
            "countryOfOrigin" => $product->country_of_origin,
            "weight" => [
                "gross" => $product->weight_gross,
                "net" => $product->weight_net,
                "unit" => $product->weight_unit
            ],
            "company" => [
                "companyName" => $company->company_name,
                "companyAddress" => $company->company_address,
                "companyTelephone" => $company->company_telephone,
                "companyEmail"  => $company->company_email,
                "owner" => [
                    "name" => $owner->name,
                    "mobileNumber" => $owner->mobile_number,
                    "email" => $owner->email
                ],
                "contact" => [
                    "name" => $contact->name,
                    "mobileNumber" => $contact->mobile_number,
                    "email" => $contact->email
                ]
            ]

        ];

        return response($response, 200);
    }
}
