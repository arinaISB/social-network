<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber_id',
        'subscribed_to_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    public function followersCount($userId)
    {
        return $this->where('subscribed_to_id', $userId)->count();
    }

    public function followingCount($userId)
    {
        return $this->where('subscriber_id', $userId)->count();
    }
}
