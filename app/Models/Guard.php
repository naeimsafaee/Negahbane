<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guard extends Model{
    use HasFactory;

    public function client_licence(){
        return $this->belongsTo(Client_licence::class);
    }

}
