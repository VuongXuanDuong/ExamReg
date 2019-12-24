<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use App\Models\Exam;

class ExamShift extends Model
{
    //
    protected $fillable = ['module_id', 'exam_id', 'day', 'time_start', 'time_finish'];

    public function module()
    {
        return $this->hasOne(Module::class, 'id', 'module_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function exam_room()
    {
        return $this->hasMany(ExamRoom::class, 'exam_shift_id', 'id');
    }
}
