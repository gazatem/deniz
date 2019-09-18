<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    public function getStatusMessageAttribute()
    {
        if ($this->status) {
            return "Active";
        }
        return "Not Active";
    }    

    public function getMenuMessageAttribute()
    {
        if ($this->status) {
            return "True";
        }
        return "False";
    }    
     
    public function getSummaryTextAttribute()
    {
        return Str::words($this->summary, '25');
    }    
 
}
