<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'subject'
    ];

//    Si on veut désactiver les colonnes CREATED_AT et UPDATED_AT
//    public $timestamps = false;
}
