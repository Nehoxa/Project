<?php

namespace App\Models;

use App\Models\User;
use App\Models\Proposal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOnline($query)
    {
        return $query->where('status', 1);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class);
    }

    public function isLiked()
    {
        if (auth()->check()) {
            return auth()->user()->likes->contains('id', $this->id);
        }
    }
}
