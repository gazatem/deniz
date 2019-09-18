<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use View;
use Theme;

class BaseController extends Controller
{
    function __construct() {

        $all = Setting::all();

        $settings = [];
            foreach($all as $item){
                $settings[$item->setting_name] = $item->setting_value;
        } 
        $models = Page::where('status', 1)->where('is_menu_item', 1)->orderBy('sort_order', 'ASC')->get();
       
        $menu = collect();
        foreach($models as $model){
            $menu->push(['slug' => $model->slug, 'title' => $model->title]);
        }

        if (isset($settings['theme'])){
            Theme::set($settings['theme'] . '/views');
        }else{
            Theme::set('starter/views');            
        }

        $menu->push(['slug' => 'contact', 'title' => 'Contact']);
        $this->menu = $menu;
        View::share('menu', $menu);
        View::share('settings', $settings);        
    }
}