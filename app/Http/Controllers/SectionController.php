<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function section()
    {
        $section=Section::all();
        return view('admin.section.section',compact('section'));
    }
    public function updatesection(Request $request,$id)
    {
        $section=Section::find($id);
        $section->status=$request->status;
        $section->save();
        return redirect()->back();
    }
}
