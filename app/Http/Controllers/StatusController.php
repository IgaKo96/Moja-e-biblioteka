<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function addStatus(Request $request)
    {
    	$status = new Status;
    	$status->book_id = $request->book_id;
    	$status->user_id = auth()->user()->id;
    	$status->status = $request->status;
    	$status->save();
    }

    public function editStatus(Request $request)
    {
    	$status = Status::where('user_id',auth()->user()->id)
            ->where('book_id',$request->book_id)->first();
        $status->status = $request->status;
        $status->update();
    }

    public function addOrEditStatus(Request $request)
    {
    	if(Status::where('user_id',auth()->user()->id)
            ->where('book_id',$request->book_id)
            ->count() == 0)
        {
            $this->addStatus($request);
        }
        else
        {
            $this->editStatus($request);
        }
        return redirect()->back();
    }

    public function index(Request $request)
    {
    	if(isset($request->status))
    	{
        	$books = DB::table('statuses as s')
    			->join('books as b','b.id','=','s.book_id')
    			->join('categories as c','c.id','=','b.category_id')
    			->select('b.*','c.category_name','s.*')
    			->where('s.user_id','=',auth()->user()->id)
    			->where('s.status','=',$request->status)
    			->get();	
    	}
    	else
    	{
        	$books = DB::table('statuses as s')
    			->join('books as b','b.id','=','s.book_id')
    			->join('categories as c','c.id','=','b.category_id')
    			->select('b.*','c.category_name','s.*')
    			->where('s.user_id','=',auth()->user()->id)
    			->get();
    	}

        $featured_books = $this->recommendedForYou();

    	$newest_books = DB::table('books as b')
    					->join('categories as c','c.id','=','b.category_id')
    					->select('b.*','c.category_name')
    					->orderBy('id','DESC')
    					->limit(4)
    					->get();
    	$categories = Category::all();
    	return view('dashboard',compact('books','newest_books','categories','featured_books'));
    }

    public function recommendedForYou()
    {
        $help_query_in = DB::table('books as b')
                ->join('statuses as s', 'b.id', '=', 's.book_id')
                ->join('categories as c','c.id','=','b.category_id')
                ->select('b.category_id')
                ->where('s.user_id','=',auth()->user()->id)
                ->where('s.status','=','przeczytane');

        $help_query_not_in = DB::table('books as b')
                ->join('statuses as s', 'b.id', '=', 's.book_id')
                ->join('categories as c','c.id','=','b.category_id')
                ->select('b.id')
                ->where('s.user_id','=',auth()->user()->id)
                ->where('s.status','=','przeczytane');

        $fb = DB::table('books as b')
            ->select('b.*')
            ->whereIn('b.category_id', $help_query_in)
            ->whereNotIn('b.id', $help_query_not_in)
            ->inRandomOrder()
            ->limit(5)
            ->get();

            return $fb;
    }

}
