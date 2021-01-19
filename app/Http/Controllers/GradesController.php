<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class GradesController extends Controller
{
    public function index()
    {
    	$data = Grade::all();

    	return view('index_grade',compact('data'));
    }

    public function addGrade(Request $request)
    {
    	$grade = new Grade;
    	$grade->value = $request->value;
    	$grade->book_id = $request->book_id;
    	$grade->user_id = auth()->user()->id;
    	$grade->save();
    }
    
    public function editGrade(Request $request)
    {
        $grade = Grade::where('user_id',auth()->user()->id)
            ->where('book_id',$request->book_id)->first();
        $grade->value = $request->value; 
        $grade->update();
    }

    public function addOrEditGrade(Request $request)
    {
        if(Grade::where('user_id',auth()->user()->id)
            ->where('book_id',$request->book_id)
            ->count() == 0)
        {
            $this->addGrade($request);
        }
        else
        {
            $this->editGrade($request);
        }
        return redirect()->back();
    }

    public function hardDeleteGrade($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return redirect('/grades/list');
    }
}
