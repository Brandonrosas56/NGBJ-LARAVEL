<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Provider;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->leftJoin('details', 'details.product_id', '=', 'products.id')
            ->leftJoin('invoices', 'details.invoice_id', '=', 'invoices.id')
            ->select(
                'products.id',
                'products.name',
                'products.stock',
                'products.reference',
                'products.price',
                'products.status',
                DB::raw('SUM(IF(details.stock AND invoices.status = "active", details.stock, 0)) as stockDetail')
            )
            ->groupBy(
                'products.id',
                'products.name',
                'products.stock',
                'products.reference',
                'products.price',
                'products.status',
                'details.product_id'
            )
            ->get();

        $companies = Company::all();
        $providers = Provider::all();
        $subcategories = Subcategory::query()
            ->select('subcategories.id', 'subcategories.name')
            ->get();

        $users = User::all();

        return view('products.index', compact('products', 'companies', 'providers', 'subcategories', 'users'));
    }

    public function show($id)
    {
        $companies = Company::all();
        $providers = Provider::all();
        $product = Product::find($id);
        $subcategories = Subcategory::query()
            ->select('subcategories.id', 'subcategories.name')
            ->get();

        return view('products.show', compact('product', 'companies', 'providers', 'subcategories'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $companies = Company::all();
        $providers = Provider::all();
        $subcategories = Subcategory::query()
            ->select('subcategories.id', 'subcategories.name')
            ->get();

        return view('products.edit', compact('product', 'companies', 'providers', 'subcategories'));
    }
}
