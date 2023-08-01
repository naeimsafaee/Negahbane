<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Licence extends Model{
    use HasFactory;

    protected $appends = ['full_image_url'];

    public function getFullImageUrlAttribute(){
        return Voyager::image($this->image);
    }

}
