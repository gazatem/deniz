<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\Photo;

class GalleryController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $galleries = Gallery::all();
        $photos = Photo::where('gallery_id', '<>', 0)->paginate(12);
        $menu = $this->menu;
        return view('gallery', compact('menu', 'galleries', 'photos'));
    }

    public function photos(Gallery $gallery)
    {
        $galleries = Gallery::all();
        $photos = $gallery->photos()->paginate(12);
        $menu = $this->menu;
        return view('photos', compact('menu', 'galleries', 'photos', 'gallery'));
    }    
}
