<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
