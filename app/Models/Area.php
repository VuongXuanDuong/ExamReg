<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Area extends Model
{
    //
    protected $fillable = ['name'];

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}


