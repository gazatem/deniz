<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\UploadedFile;
use Image;
use Storage;
/**
 * Class DashboardController.
 */
class BannerController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->paginate();
        
        return view('backend.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.banners.create_edit');
    }

    public function store(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = time();
            $folder = 'uploads/banners/';
            $filename = $name . '.' . $image->getClientOriginalExtension();
            $filePath = $folder . $filename;
            $this->uploadOne($image, $folder, 'public', $name);
        }
        $banner = new Banner;
        $banner->image = $filename;
        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->description = $request->description;
        if ($banner->save()) {
            return redirect(route('backoffice.banners.edit', $banner->id))->with('success', 'Your new banner has been recorded!');
        }
        $error = $banner->errors()->all(':message');
        return redirect(route('backoffice.banners.create'))->with('error', $error)->withInput();
    }

    public function edit(Banner $banner)
    {
        return view('backend.banners.create_edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/banners/', $filename);
            $banner->image = $filename;
        }
        $banner->link = $request->link;
        $banner->title = $request->title;
        $banner->description = $request->description;

        if ($banner->save()) {
          
            return redirect(route('backoffice.banners.edit', $banner->id))->with('success', 'Your banner has been recorded!');
        }
        $error = $banner->errors()->all(':message');
        return redirect(route('backoffice.banners.edit', $banner->id))->with('error', $error)->withInput();
    }

    public function delete(Banner $banner)
    {
        $banner->delete();
        return redirect(route('backoffice.banners'))->with('success', 'Banner had been deleted!');
    }       
    
    private function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);
        $extension =  $uploadedFile->getClientOriginalExtension();
        $uploadedFile->storeAs($folder, $name . '.' . $extension, $disk);
 
        $filepath = Storage::disk($disk)->path($folder . $name . '.' . $extension);
        $img = Image::make($filepath);
        
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream(); 
        Storage::disk($disk)->put($folder .'thump_'.$name .'.'. $extension, $img);
        return ;
    }    

}
