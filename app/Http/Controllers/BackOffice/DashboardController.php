<?php

namespace App\Http\Controllers\BackOffice;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Controller;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Contact;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages =  Page::orderBy('created_at', 'desc')->take(5)->get();
        $blogs =  Blog::orderBy('created_at', 'desc')->take(5)->get();
        $contacts =  Contact::orderBy('created_at', 'desc')->take(5)->get();
        return view('backend.dashboard', compact('blogs', 'pages', 'contacts'));        
    }
}
