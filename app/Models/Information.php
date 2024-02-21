<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'informations';

    protected $fillable = [
        'user_id',
        'status',
        'job',
        'city',
        'hobby',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
}
