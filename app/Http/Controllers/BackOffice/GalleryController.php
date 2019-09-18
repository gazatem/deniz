<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Requests\UploadRequest;
use App\Models\Gallery;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Image;
use Storage;

/**
 * Class DashboardController.
 */
class GalleryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->paginate(20);
        return view('backend.gallery.index', compact('photos'));
    }

    public function list_galleries()
    {
        $galleries = Gallery::all();
        return view('backend.gallery.list_galleries', compact('galleries'));
    }

    public function upload()
    {
        $galleries_data = Gallery::all()->pluck('name', 'id');
        $galleries = [];

        $galleries[0] = '----';
        foreach ($galleries_data as $key => $value) {
            $galleries[$key] = $value;
        }

        return view('backend.gallery.upload', compact('galleries'));
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

    public function upload_save(UploadRequest $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = time();
            $folder = 'uploads/photos/';
            $filename = $name . '.' . $image->getClientOriginalExtension();
            $filePath = $folder . $filename;
            $this->uploadOne($image, $folder, 'public', $name);
        }

        $photo = new Photo;
        $photo->image = $filename;
        $photo->alt_text = $request->alt_text;
        $photo->gallery_id = $request->gallery_id;
        if ($photo->save()) {
            return redirect(route('backoffice.gallery.upload'))->with('success', 'Your new photo has been uploaded!');
        }
        $error = $photo->errors()->all(':message');
        return redirect(route('backoffice.gallery.upload'))->with('error', $error)->withInput();
    }

    public function deleteOne($folder = null, $disk = 'public', $filename = null)
    {
        Storage::disk($disk)->delete($folder . $filename);
    }

    public function create()
    {
        return view('backend.gallery.create_edit');
    }

    public function store(Request $request)
    {
        $gallery = new Gallery;
        $gallery->name = $request->name;

        if ($gallery->save()) {
            return redirect(route('backoffice.gallery.edit', $gallery->id))->with('success', 'Your new gallery has been recorded!');
        }
        $error = $gallery->errors()->all(':message');
        return redirect(route('backoffice.gallery.create'))->with('error', $error)->withInput();
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.create_edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $gallery->name = $request->name;

        if ($gallery->save()) {

            return redirect(route('backoffice.gallery.edit', $gallery->id))->with('success', 'Your gallery has been recorded!');
        }
        $error = $blog->errors()->all(':message');
        return redirect(route('backoffice.blog.edit', $blog->id))->with('error', $error)->withInput();
    }

    public function delete(Photo $photo)
    {
        $photo->delete();
        return redirect(route('backoffice.gallery'))->with('success', 'Photo had been deleted!');
    }
}
