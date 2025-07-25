<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPayments extends Model
{
    use HasFactory;

    public function subscription() {
        return $this->belongsTo(Subscription::class);
    }
}
