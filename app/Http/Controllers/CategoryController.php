<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoris, $category;

    public function index()
    {
        return view('category.index');
    }

    public function create(Request $request)
    {
        Category::newCategory($request);
        return redirect('category/add')->with('message', 'Category add successfully');
    }

    public function manage()
    {
        $this->categoris = Category::all();
        // return view('category.manage', ['categoris' => $this->categoris]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('category.edit', ['category' => $this->category]);
    }

    public function update(Request $request)
    {
        // return $request->name;
        Category::updateCategory($request);
        return response()->json([
            "success" => "Category updated successfully."
        ]);
        // return redirect('category/manage')->with('message', 'Updated');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('category/manage')->with('message', 'Deleted');
    }
}
