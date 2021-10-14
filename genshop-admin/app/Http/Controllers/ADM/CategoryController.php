<?php

namespace App\Http\Controllers\ADM;

use App\Http\Controllers\Controller;
use App\Models\ADM\Category;
use App\Models\ADM\Store;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $store_id = Store::where('user_id', Auth()->user()->id)->first();
        if($store_id){
            $categories = Category::where('store_id', $store_id->user_id)->get();
            return view('category.index', compact('categories'));
        }   else {
            $categories = null;
            return view('category.index', compact('categories'));
        }
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'store_id' => Auth()->user()->id,
            'name' => $request['nome']
        ]);
        session()->flash('success', 'Categoria criada com sucesso');
        return redirect(route('category.index'));
    }

    public function show(Category $category)
    {
        return view('category.show')->with(['category' => $category, 'products' => $category->products()->paginate(6)]);
    }

    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update(['name' => $request['nome']]);
        session()->flash('success', 'Categoria alterada com sucesso');
        return redirect(route('category.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Categoria excluída com sucesso');
        return redirect(route('category.index'));
    }
}
