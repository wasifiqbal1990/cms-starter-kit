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

     public function create(Request $request)
     {
         $pages = Pages::all();
         return view('dashboard.sections.create', ['pages' => $pages]);
     }

     public function store(Request $request)
     {
         $data = $request->all();
         $sectionInput = [
             'title' => $data['title'],
             'short_description' => $data['short_description'],
             'description' => $data['description'],
             'page_id' => $data['page_id'],
             'hashtag' => $data['hashtag'],
             'order' => $data['order'],
             'extra' => [],
         ];
         $section = new Sections($sectionInput);
         $section->save();

         foreach ($data['section'] as $key=>$imageSection)
         {
             $section->addMedia($request->files->get('section')[$key]['image'])->withCustomProperties(
                 [
                     'heading' => $imageSection['heading'],
                     'description' => $imageSection['description']
                 ]
             )->toMediaCollection('images');
         }

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
