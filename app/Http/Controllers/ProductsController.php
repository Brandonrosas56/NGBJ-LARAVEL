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

    public function store(Request $request)
    {
        $reference = $request['reference'];

        $exisProduct = Product::query()
            ->where('reference', '=', $reference)
            ->get();

        if (count($exisProduct) > 0) {
            session()->flash('error', 'Referencia ya registrada');
            return redirect()->route('productos')->with('message', session('error'));
        }
        $ultimoId = Product::latest()->first()->id;

    
        $request['user_id'] = Auth::user()->id;
        // Guarda un mensaje de éxito en la sesión
        session()->flash('success', 'Producto creado correctamente');

        $product = Product::create($request->all());

        $users = User::all();
        foreach ($users as $user) {
            Notification::create([
                'title' => 'Se ha creado un producto',
                'message' => 'El usuario ' . Auth::user()->name . ' ha creado el producto ' . $request['name'],
                'type' => 'product',
                'reference' => $product['id'],
                'user_id' => $user['id']
            ]);
        }
        return redirect()->route('productos')->with('message', session('success'));
    }
    //Eliminar--> retorno vista proveedores
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('productos');
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
