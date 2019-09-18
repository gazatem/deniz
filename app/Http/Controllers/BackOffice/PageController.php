<?php

namespace App\Http\Controllers\BackOffice;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Str;
use App\Models\Setting;
use File;

/**
 * Class DashboardController.
 */
class PageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages =  Page::orderBy('created_at', 'desc')->paginate();
        return view('backend.pages.index', compact('pages'));        
    }

    public function create()
    {
        $status = ['0' => 'None-Active', '1' => 'Active'];
        $is_menu_item = ['0' => 'False', '1' => 'True'];
 
        $theme = Setting::where('setting_name', 'theme')->first();
        $template_path = base_path('resources/themes') .'/'. $theme->setting_value .'/views/templates';

        $files = File::allFiles($template_path);
        $templates = ['----'];
        foreach ($files as $file) {
            $templates[substr($file->getRelativePathname(), 0, strpos($file->getRelativePathname(), '.'))] = substr($file->getRelativePathname(), 0, strpos($file->getRelativePathname(), '.'));
        }
        
        return view('backend.pages.create_edit', compact('status', 'is_menu_item', 'show_home', 'templates'));        
    }

    public function edit(Page $page)
    {
        $status = ['0' => 'None-Active', '1' => 'Active'];
        $is_menu_item = ['0' => 'False', '1' => 'True'];
        $theme = Setting::where('setting_name', 'theme')->first();
        $template_path = base_path('resources/themes') .'/'. $theme->setting_value .'/views/templates';
        $files = File::allFiles($template_path);
        $templates = ['----'];
        foreach ($files as $file) {
            $templates[substr($file->getRelativePathname(), 0, strpos($file->getRelativePathname(), '.'))] = substr($file->getRelativePathname(), 0, strpos($file->getRelativePathname(), '.'));
        }

        return view('backend.pages.create_edit', compact('page', 'status', 'is_menu_item', 'show_home', 'templates'));
    }

    public function view(Page $page)
    {
        return redirect(route('frontend.page', $page->slug));
    }    

    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;                        
        $page->status = $request->status;
        $page->content = $request->content;
        $page->summary = $request->summary;
        $page->template = $request->template;
        $page->is_menu_item = $request->is_menu_item;
        $page->slug = (empty($request->slug) ? Str::slug($request->title) : $request->slug);

        if ($page->save()) {
            return redirect(route('backoffice.pages.edit', $page->id))->with('success', 'Your new page has been recorded!');
        }
        $error = $page->errors()->all(':message');
        return redirect(route('backoffice.page.create'))->with('error', $error)->withInput();
    }

    public function update(Request $request, Page $page)
    {
        $page->title = $request->title;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;          
        $page->status = $request->status;
        $page->content = $request->content;
        $page->template = $request->template;       
        $page->summary = $request->summary;
        $page->is_menu_item = $request->is_menu_item;
        $page->slug = $request->slug;
        if ($page->save()) {
            $page->slug = Str::slug($page->title, '-') ;
            $page->save();
            return redirect(route('backoffice.pages.edit', $page->id))->with('success', 'Your page has been recorded!');
        }
        $error = $page->errors()->all(':message');
        return redirect(route('backoffice.page.edit', $page->id))->with('error', $error)->withInput();
    }

    public function delete(Page $page)
    {
        $page->delete();
        return redirect(route('backoffice.pages'))->with('success', 'Page had been deleted!');
    }     
}
