<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Client extends Authenticatable{
    use HasFactory , HasApiTokens , Notifiable;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'password',
        'licence_id',
        'reset_link'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function licence(){
        return $this->belongsTo(Licence::class);
    }

    public function guards(){
        return $this->hasManyThrough(Guard::class, Client_licence::class);
    }

}
