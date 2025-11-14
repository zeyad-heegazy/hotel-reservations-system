<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guest extends Model
{
    use LogsActivity;
    protected $fillable = ['name', 'email', 'phone'];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
