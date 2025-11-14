<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use LogsActivity;
    protected $fillable = ['name', 'address'];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'hotel_id');
    }
}
