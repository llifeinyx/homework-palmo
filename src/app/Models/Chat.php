<?php

namespace App\Models;

use http\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'vendor_id',
        'vendee_id'
    ];

    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id');
    }
    public function vendee(){
        return $this->belongsTo(User::class, 'vendee_id');
    }
    public function message(){
        return $this->hasMany(Message::class, 'chat_id');
    }
}
