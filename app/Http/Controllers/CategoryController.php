<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if (Gate::denies('isAdmin')) 
        {
            abort(403);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
