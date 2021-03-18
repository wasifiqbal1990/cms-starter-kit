<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
     public function index()
     {
         $sections = Sections::paginate( 20 );
         return view('dashboard.sections.sectionsList', ['sections' => $sections]);
     }

     public function create()
     {
         $pages = Pages::all();
         return view('dashboard.sections.create', ['pages' => $pages]);
     }

     public function store(Request $request)
     {
         $section = new Sections($request->all() + ['extra' => []]);
         $section->save();
         $request->session()->flash('message', 'Successfully created section');
         return redirect()->route('sections.index');
     }

     public function edit()
     {

     }

     public function update(Request $request)
     {

     }

     public function delete(Request $request)
     {

     }
}
