<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';

    protected $fillable = [
        'user_id',
        'description',
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function images(){
        return $this->belongsToMany(Image::class);
    }
}
