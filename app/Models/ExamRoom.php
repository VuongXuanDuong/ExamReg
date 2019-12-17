<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExamShift;
use App\Models\Room;

class ExamRoom extends Model
{
    //
    protected $fillable = ['exam_shift_id', 'room_id', 'name'];
    public function examShift () {
        return $this->belongsTo(ExamShift::class);
    }
    public function room() {
        return $this->belongsTo(Room::class);
    }
}
