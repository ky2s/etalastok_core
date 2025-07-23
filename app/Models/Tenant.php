<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('role')->withTimestamps();
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
