<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk berdasarkan company_id
    public function index($companyid)
    {
        $products = Product::where('company_id', $companyid)->get();
        return view('products.detail', compact('products', 'companyid'));
    }

    // Menampilkan form create
    public function create($id)
    {
        $company = Company::findOrFail($id);
        return view('products.create', compact('company'));
    }

    // Menyimpan produk baru
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company = Company::findOrFail($id);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = new Product();
        $product->company_id = $company->id; // Menyimpan company_id
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $imagePath;
        $product->save();

        return redirect()->route('companies.show', $company->id)->with('success', 'Product created successfully!');
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.detail-item', compact('product'));
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $companyid = $product->company_id; // Mendapatkan company_id dari produk
        return view('products.edit', compact('product', 'companyid'));
    }

    // Mengupdate data produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $fileName);
            $product->image = $fileName;
        }

        $product->save();

        return redirect()->route('products.index', $product->company_id)->with('success', 'Product updated successfully.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $companyid = $product->company_id; // Mendapatkan company_id untuk redirect
        $product->delete();

        return redirect()->route('products.index', $companyid)->with('success', 'Product deleted successfully.');
    }
}
