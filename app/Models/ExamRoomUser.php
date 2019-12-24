<?php

namespace App\Models;

use App\Models\ExamRoom;
use App\StudentAccount;
use Illuminate\Database\Eloquent\Model;

class ExamRoomUser extends Model
{
    //
    protected $fillable = ['exam_room_id', 'user_id'];

    public function exam_room()
    {
        return $this->belongsTo(ExamRoom::class, 'exam_room_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(StudentAccount::class, 'user_id', 'id');
    }
}
