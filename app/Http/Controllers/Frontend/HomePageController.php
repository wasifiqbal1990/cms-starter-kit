<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notices;
use App\Models\Pages;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $viewPrefix = "frontend.rise";

    public function index()
    {
        $homePage = Pages::where('key','homepage')->with('Sections.Media')->first();
        $sections = $homePage->Sections->mapWithKeys(function($section,$key){
            return [$section->hashtag => $section];
        });
        $events = Notices::where('type',1)->where('status',1)->get();
        $params = [
            'homepage' => $homePage,
            'sections' => $sections,
            'events' => $events,
//            'notifications' => $notifications
        ];

        return view($this->viewPrefix.'.homepage',$params);
    }
}
