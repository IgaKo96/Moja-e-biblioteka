<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;
use App\Models\Status;

class BooksController extends Controller
{
    public function index()
    {
    	$data = Book::all();

    	return view('index_book',compact('data'));
    }

    public function single($id)
    {
    	$book = Book::find($id);
    	$category = Book::find($id)->category;
        $grade = round(Book::find($id)->grades()->avg('value'),2);
        $user_grade = Grade::where('book_id',$id)->where('user_id',auth()->user()->id ?? '')->first()->value ?? '';
        $user_status = Status::where('book_id',$id)->where('user_id',auth()->user()->id ?? '')->first()->status ?? '';
    	return view('single_book',compact('book','category','grade','user_grade','user_status'));
    }
    
    public function addView()
    {
    	$categories = Category::all();
    	return view('add_book',compact('categories'));
    }

    public function addBook(Request $request)
    {
    	$this->validate($request, [
        	'title' => 'required',
        	'author' => 'required',
        	'year' => 'required'
        ]);
    	$book = new Book;
    	$book->title = $request->title;
    	$book->author = $request->author;
    	$book->description = $request->description;
    	$book->category_id = $request->category_id;
    	$book->year = $request->year;
    	$book->file_url = (is_null($request->file)) ? null : $request->file('file')->store('public/img');
    	$book->save();
    	return redirect('/books/list');
    }

    public function editView($id)
    {
    	$book = Book::find($id);
    	$categories = Category::all();
    	return view('edit_book',compact('book','categories'));
    }

    public function editBook(Request $request, $id)
    {
    	$this->validate($request, [
        	'title' => 'required',
        	'author' => 'required',
        	'year' => 'required'
        ]);
    	$book = Book::find($id);
    	$book->title = $request->title;
    	$book->author = $request->author;
    	$book->description = $request->description;
    	$book->category_id = $request->category_id;
    	$book->year = $request->year;
    	if(!is_null($request->file))
    	{
    		if(is_null($book->file_url))
    			$book->file_url = $request->file('file')->store('public/img');
    		else
    		{
    			unlink(storage_path().'/app/'.$book->file_url);
    			$book->file_url = $request->file('file')->store('public/img');
    		}

    	}	

    	$book->update();
    	return redirect('/books/list');
    }

    public function hardDeleteBook($id)
    {
    	$book = Book::find($id);
    	$book->delete();
    	return redirect('/books/list');
    }

    public function homepage()
    {
    	return view('home');
    }

}
