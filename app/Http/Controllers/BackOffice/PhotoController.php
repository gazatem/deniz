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
class PhotoController extends Controller
{
 
    public function show(Photo $photo)
    {
        return view('backend.photos.show', compact('photo'));
    }

    public function delete(Photo $photo)
    {
        Storage::disk('public')->delete('uploads/photos/'.$photo->image);
        $photo->delete();

        return redirect(route('backoffice.gallery'))->with('success', 'Photo had been deleted!');
    }
}
