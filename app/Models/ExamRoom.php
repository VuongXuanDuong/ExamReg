<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamRoom extends Model
{
    //
    protected $fillable = ['exam_shift_id', 'room_id', 'name'];
}
