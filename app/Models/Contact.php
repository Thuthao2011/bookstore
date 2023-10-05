<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'email',
        'message',
        'status',
    ];

    // Quan hệ tới người dùng (nếu cần)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

