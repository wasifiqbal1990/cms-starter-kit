<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use App\Models\Sections;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function index(Request $request, $type)
    {
        $notices = Notices::paginate( 20 );
        return view('dashboard.notices.noticesList', ['notices' => $notices,'type' => $type]);
    }

    public function create(Request $request, $type)
    {
        return view('dashboard.notices.create',['type' => $type]);
    }

    public function store(Request $request, $type)
    {
        $data = $request->all();
        $data['type'] = $type == 'events'? 1:2; // events | notifications
        $data['status'] = 1;
        Notices::create($data);
        $request->session()->flash('message', 'Created Successfully');
        return redirect()->route($type.'.index');
    }

    public function edit()
    {

    }

    public function update(Request $request,$id)
    {

    }

    public function delete(Request $request,$id)
    {

    }
}
