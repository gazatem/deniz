<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Banner;
use View;

class PageController extends BaseController
{
    public function show(Page $page)
    {
        $banners = [];
        if (!isset($page->title)){
            $page = Page::where('slug', 'home')->first();
            $banners = Banner::all();
        }
        $template = null;
        if($page->template){
            $template = 'templates.' . $page->template;
        }
        return view('page', compact('page', 'template', 'banners'));
    }    
}
