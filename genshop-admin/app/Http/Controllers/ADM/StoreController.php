<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index')->with('stores', Store::all());
    }

    public function create()
    {
        return view('store.create');
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
