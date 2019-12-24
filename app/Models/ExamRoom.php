<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExamShift;
use App\Models\Room;

class ExamRoom extends Model
{
    //
    protected $fillable = ['exam_shift_id', 'room_id', 'name'];

    public function exam_shift()
    {
        return $this->belongsTo(ExamShift::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function exam_room_user()
    {
        return $this->hasMany(ExamRoomUser::class, 'exam_room_id', 'id');
    }
}
