<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index' ,compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1 validation
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255|min:3'
        ]);

        // 2 insert
        // $category = new Category();
        // $category->name = $request->name;
        // $category->save();

        Category::create($request->all());

        // 3 redirect page
        return redirect()->route('categories.index')->with('success','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // $category->name = $request->name;
        // $category->save();

        $category->update($request->all()); 

        return redirect()->route('categories.index')->with('success' , 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success' , 'Category Deleted Successfully');
    }
}
