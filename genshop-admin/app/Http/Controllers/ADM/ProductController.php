<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show(Tag $tag)
    {
        
    }

    public function edit(Tag $tag)
    {
        
    }

    public function update(Request $request, Tag $tag)
    {
        
    }

    public function destroy(Tag $tag)
    {
        
    }
}
