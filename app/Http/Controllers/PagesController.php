<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pages = Pages::paginate( 20 );
        return view('dashboard.pages.pagesList', ['pages' => $pages]);
    }

    public function create()
    {
        return view('dashboard.pages.create', []);
    }

    public function store(Request $request)
    {
        $pages = new Pages($request->all() + ['extra' => []]);
        $pages->save();
        $request->session()->flash('message', 'Successfully created page');
        return redirect()->route('pages.index');
    }

    public function edit()
    {
        $pages = Pages::paginate( 20 );
        return view('dashboard.pages.pagesList', ['pages' => $pages]);
    }

    public function update()
    {
        $pages = Pages::paginate( 20 );
        return view('dashboard.pages.pagesList', ['pages' => $pages]);
    }

    public function delete()
    {
        $pages = Pages::paginate( 20 );
        return view('dashboard.pages.pagesList', ['pages' => $pages]);
    }
}
