<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class ExamShift extends Model
{
    //
    protected $fillable = ['module_id', 'exam_id','day','time_start','time_finish'];

    public function module() {
        //
    }
}
