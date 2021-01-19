<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
    	$data = Category::all();

    	return view('index_category',compact('data'));
    }

    public function single($id)
    {
        $category = Category::find($id);
        $books = Category::find($id)->books;

        return view('single_category',compact('category','books'));
    }

    public function addView()
    {
    	return view('add_category');
    }

    public function addCategory(Request $request)
    {
    	$this->validate($request, [
            'category_name' => 'required'
        ]);
    	$category = new Category;
    	$category->category_name = $request->category_name;
    	$category->save();
    	return redirect('/categories/list');
    }

    public function editView($id)
	{
    	$category = Category::find($id);
    	return view('edit_category',compact('category'));
    }

    public function editCategory(Request $request, $id)
    {
     	$this->validate($request, [
            'category_name' => 'required'
        ]);   	
    	$category = Category::find($id);
    	$category->category_name = $request->category_name;
    	$category->update();

    	return redirect('/categories/list');
    }

    public function hardDeleteCategory($id)
    {
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('/categories/list');
    }

}
