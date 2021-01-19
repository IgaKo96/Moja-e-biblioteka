<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchResults(Request $request)
    {

    	if(isset($request->search_slug ) && $request->search_category == '')
    	{
    		$books = Book::where('title','like','%'.$request->search_slug.'%')
    			->orWhere('author','like','%'.$request->search_slug.'%')
    			->orWhere('year','like','%'.$request->search_slug.'%')
    			->get();		
    	}
    	elseif(isset($request->search_slug ) && $request->search_category != '')
    	{
    		$books = Book::where('title','like','%'.$request->search_slug.'%')
    			->orWhere('author','like','%'.$request->search_slug.'%')
    			->orWhere('year','like','%'.$request->search_slug.'%')
    			->where('category_id','=',$request->search_category)
    			->get();		
    	}
    	else
    	{
    		$books = Book::where('category_id','=',$request->search_category)
    			->get();		
    	}
    	return view('search_results',compact('books'));
    }
}
