<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{ 
    use SoftDeletes;
    public function gallery()
    {
            return $this->belongsTo(Gallery::class);
    }

    public function getGalleryNameAttribute()
    {
        if($this->gallery){
            return  $this->gallery->name;
        }
        return 'No Gallery';
    }
}