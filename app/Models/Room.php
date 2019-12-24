<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Room extends Model
{
    //
    protected $fillable = ['name', 'total_computer', 'area_id'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
